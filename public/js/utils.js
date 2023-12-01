function getMetaValueByName(name) {
	const metaElements = Array.from(document.getElementsByTagName('meta'));
	const matchedMeta =  metaElements.find((item) => {
		return item.getAttribute('name') === name;
	});

	if (matchedMeta === undefined) throw new Error(`Metatag "${name}" not found!`);

	return matchedMeta.getAttribute('content');
}
