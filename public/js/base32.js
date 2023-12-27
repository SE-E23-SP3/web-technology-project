"use strict";

/*
 * Greatest common divisor
 * See Euclidean algorithm
 */
function gcd(a, b) {
	let c;
	while (b !== 0) {
		c = a % b;
		a = b;
		b = c;
	}
	return a;
}

/*
 * Least common multiplier
 * https://en.wikipedia.org/wiki/Least_common_multiple
 */
function lcm(a, b) {
	if (a === 0 && b === 0) return 0;
	return Math.abs(a * b) / gcd(a, b);
}

const OCTET = 8; // 1 byte is 8 bits (octet)
const BITMASK_8_ON = 0b11111111; // 11111111 = 255
const BASE32_ALPHABET = "ABCDEFGHIJKLMNOPQRSTUVWXYZ234567";//"ABCDEFGHIJKLMNOPQRSTUVWXYZ234567";
const ALPHABET_IS_CASE_SENSITIVE = false;
const BASE32_REPLACEMENTS = {
	'0': /O/g,
	'1': /[IL]/g
}
const BASE32_PADDING = '=';
const BASE32_BIT_SIZE = Math.log2(BASE32_ALPHABET.length); // 5 bits per character
const BASE32_BLOCK_LENGTH = lcm(OCTET, BASE32_BIT_SIZE) / BASE32_BIT_SIZE; // 8 characters encodes 5 bytes
const BITMASK_5_ON = (BASE32_ALPHABET.length - 1); // 00011111 = 31

function bytesToBase32(bytes, pad = false) {
	let bytesArray = new Uint8Array(bytes);
	let bytesIterator = bytesArray[Symbol.iterator]();
	let iteratorResult;
	let bitBuffer = 0;
	let bitBufferSize = 0;
	let output = "";
	// let outputLength = Math.ceil(OCTET / BASE32_BIT_SIZE * bytesArray.length);
	// let outputWholeBlockLength = BASE32_BLOCK_LENGTH * Math.ceil(bytesArray.length / BASE32_BIT_SIZE);
	do {
		if (bitBufferSize < BASE32_BIT_SIZE) {
			iteratorResult = bytesIterator.next();
			if (iteratorResult.done && bitBufferSize === 0) break;
			bitBuffer = bitBuffer << OCTET | iteratorResult.value;
			bitBufferSize += OCTET;
		}
		let bitShift = bitBufferSize - BASE32_BIT_SIZE;
		let bitMask = BITMASK_5_ON << bitShift;
		let value = (bitBuffer & bitMask) >>> bitShift; // First AND, then unsigned bit right shift
		bitBufferSize -= BASE32_BIT_SIZE;
		output += BASE32_ALPHABET[value];
	} while (!iteratorResult.done);
	if (pad) output = output.padEnd(BASE32_BLOCK_LENGTH * Math.ceil(output.length / BASE32_BLOCK_LENGTH), BASE32_PADDING);
	return output;
}
