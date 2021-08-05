<template>
	<div class="footerpanel">
		<div class="footer-left-content">
            <section class="footer-links">
                <h5 v-text="uxmenu['explore']"></h5>
                <ul>
                    <li><a rel="nofollow" href="/help/topic/HelpId/35/About-us#helpContent" v-text="uxmenu['aboutus']"></a></li>
                    <li><a href="/sitemap" v-text="uxmenu['sitemap']" ></a></li>
                    <li><a href="/bookmarks"  v-text="uxmenu['bookmark']"></a></li>
                    <li><a href="/account/login/to/account" class="footer-sign-in-link"  v-text="uxmenu['signin']"></a></li>
                </ul>
            </section>
            <section class="footer-links">
                <h5 v-text="uxmenu['howcanwehelp']"></h5>
                <ul>
                    <li>
                        <a rel="nofollow" href="/help" v-text="uxmenu['help']"></a>
                    </li>
                    <li>
                        <a href="/contactus" v-text="uxmenu['contactus']"></a>
                    </li>
                    <li>
                        <a rel="nofollow" href="/help/topic/HelpId/2/When-will-my-order-arrive#helpContent"  v-text="uxmenu['whereismystuff']"></a>
                    </li>
                    <li>
                        <a rel="nofollow" href="/help/topic/HelpId/3/Which-countries-do-you-deliver-to#helpContent" v-text="uxmenu['wheredoyoudeliver']" ></a>
                    </li>
                </ul>
            </section>
            <section class="footer-links">
                <h5 v-text="uxmenu['joinus']">Join us</h5>
                <ul>
                    <li><a href="/affiliate" v-text="uxmenu['affiliate']"></a></li>
                    <li><a href="/jobs" v-text="uxmenu['jobs']"></a></li>
                </ul>
            </section>
            <section class="footer-links">
                <h5 v-text="uxmenu['importantstuff']"></h5>
                <ul>
                    <li>
                        <a rel="nofollow" href="/help/topic/HelpId/53/How-we-use-cookies#helpContent" v-text="uxmenu['cookies']"></a>
                    </li>
                    <li>
                        <a rel="nofollow" href="/help/topic/HelpId/20/Our-privacy-policy#helpContent" v-text="uxmenu['privacypolicy']"></a>
                    </li>
                    <li>
                        <a rel="nofollow" href="/help/topic/HelpId/19/Terms-and-Conditions#helpContent" v-text="uxmenu['termsandcondition']"></a>
                    </li>
                    </ul>
            </section>
        </div>
				<div class="footer-right-content">
            <div class="payment-methods">
                <p  v-text="uxmenu['weacceptthesepayment']"></p>
                <img class="lazy loaded" data-lazy="/storage/images/desktop/paymentby.jpeg" alt="Payment methods" src="/storage/images/desktop/paymentby.jpeg">
            </div>
            <div class="small-print">
                <i class="icon-bd"></i>
                <div id="copyright" class="text" title="BdiMetadata{webserver='web-bdi-fulltime-2', requestTime='0.07 sec', userSessionCurrencyCode='USD', userSessionCountry='BD', userIp='27.147.207.196', cacheParams=BdiCacheMetadata{cacheCountry='null', cacheCurrency='null', controllerName='null', actionName='null', moduleName='null', serverScheme='null', cacheNamespace='null', cacheKey='null', generatedOn=Fri Nov 27 04:49:55 UTC 2020, cacheEnabled=true}}">
                    © 2020&nbsp;
                    Puthibidda Ltd. BD.<br>Developed by ForkCoder</div>
            </div>
        </div>
  </div>
</template>

<style scoped>
.footerpanel {
	background: var(--cd-color-bg-footer);
	padding: 5px 20px;
	width: 100%;
	height: auto;
	margin-right: 5px;
	display: flex;
	justify-content: center;
	align-items: center;
	align-self: flex-end;
	color: white;
	text-align: center;
}
.footer-left-content{
	display:flex;
	flex-direction: row;
	align-self: flex-start;
	flex-wrap: wrap;
	justify-content: space-between;
	flex-grow: 1;
	text-align: left;
	margin: auto 20px;
	max-width: 1100px;
}
li{
	list-style: none;
	border-bottom: 1px solid rgba(255,255,255,0.1);
}
a{
	color: #eee;
}
section{
	margin: 10px;
}
.lazy {
    opacity: 0;
    -webkit-transition: opacity linear 0.2s;
    -o-transition: opacity linear 0.2s;
    transition:opacity linear 0.2s
}

.lazy.loaded {
    opacity:1
}
img{
	max-width: 100%;
	height: auto;
	vertical-align: middle;
}
</style>
<script>
  export default {
    name: 'FooterPanel',
		props:['cards', 'uxmenu']
  }
</script>
