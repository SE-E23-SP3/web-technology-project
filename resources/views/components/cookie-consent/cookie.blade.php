<div class="cookie-backgrounds">
    <div class="cookie-contain slider">
        <div class="slides">
            <div class="cookie-consent-info" id='slide-1'>
                <h1>We value your privacy</h1>
                <p>We use cookies to enhance your browsing experience. We use essential cookies that are necessary to run our website like making sure that you are logged in when browsing.</p>
                <div class="buttons">
                    <a href="#slide-2" class="button cookie-button">Customize Cookies</a>
                    <button type="submit" form="cookieForm" name="submit-type" value="accept-only-essential-cookies" class="cookie-button button-seconday">Accept Only Essential Cookies</button>
                    <button type="submit" form="cookieForm" name="submit-type" value="accept-all-cookies" class="cookie-button button-primary">Accept All Cookies</button>
                </div>
            </div>
            <div class="cookie-customize-info" id='slide-2'>
                <h1>Customize Cookies</h1>
                <a href="#slide-1" class="back-link">< back</a>
                <form id="cookieForm" action="{{ url('/accept-cookies') }}" method="post">
                    @csrf
                    <div class="cookie-setting">
                        <label for="essentialCookies">Essential cookies</label>
                        <p id="essentialCookies">always active</p>
                    </div>
                    <div class="cookie-setting">
                        <label for="analyticCookies">Analytics cookies</label>
                        <input type="checkbox" name="analytic-cookies" id="analyticCookies">
                    </div>
                </form>
                <div class="buttons">
                    <button type="submit" form="cookieForm" name="submit-type" value="accept-only-essential-cookies" class="cookie-button">Accept Only Essential Cookies</button>
                    <button type="submit" form="cookieForm" name="submit-type" value="accept-all-cookies" class="cookie-button button-seconday">Accept All Cookies</button>
                    <button type="submit" form="cookieForm" name="submit-type" value="accept-customized-cookies" class="cookie-button button-primary">Save & Apply</button>
                </div>
            </div>
        </div>
    </div>
</div>