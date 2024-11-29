<style>
    #footer,
    #textNavFooter {
        clear: both;
        margin: 15px 5px;
        font-weight: 700;
        text-align: center;
        font-size: 15px
    }

    .footerDisclaimer {
        padding: 10px 10px;
        font-size: 14px;
        text-align: center;
        font-weight: 400
    }

    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 16px;
        font-weight: 700;
        border: none;
        outline: 0;
        background-color: rgba(245, 236, 64, .9);
        color: #c93939;
        cursor: pointer;
        padding: 10px;
        border-radius: 10px
    }

    #myBtn:hover {
        background-color: rgba(245, 236, 64, .8)
    }

    #footer {
        clear: both;
        margin-top: 1em;
        padding-top: 1em
    }

    #textNavFooter a {
        color: #0661d9 !important;
        text-decoration: none;
    }
</style>


<div class="footer_backpage">
    <div class="footerText">
        <div id="textNavFooter">
            <a href="/">Home</a> |
            <a href="/myaccount" rel="nofollow">My Account</a> |
            <a href="/contact-us" rel="nofollow">Contact</a> |
            <a href="" rel="nofollow">Privacy</a> |
            <a href="" rel="nofollow">Terms</a>
            <div class="footerDisclaimer">
                <p>
                    Copyright &copy; 2018 - 2022.
                    <a class="last" href="/">{{ config()->get('services.application.slugName') }}</a> | <a
                        class="last" href="/">Backpage
                        Alternative</a> | <a class="last" href="/">Backpage Replacement</a> | <a class="last"
                        href="/">New Backpage</a> | <a class="last" href="/">Alternative to Backpage</a> |
                    <a class="last" href="/">Backpage</a> |
                    <a class="last" href="/">Craigslist Personals</a>. All rights reserved.
                </p>
            </div>
            <button onclick="topFunction()" id="myBtn" title="Go to Top of the Page">Page Top</button>
            <script>
                window.onscroll = function() {
                    scrollFunction()
                };

                function scrollFunction() {
                    if (document.body.scrollTop > 900 || document.documentElement.scrollTop > 900) {
                        document.getElementById("myBtn").style.display = "block";
                    } else {
                        document.getElementById("myBtn").style.display = "none";
                    }
                }

                function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            </script>
            <script>
                window.onload = function() {
                    var headers = document.querySelectorAll('.geoBlock h2');
                    for (i = 0; i < headers.length; i++) {
                        var header = headers[i];
                        header.onclick = function(e) {
                            var header = e.target;
                            var inner = header.parentElement.querySelector('.inner');
                            if (inner.className.match("showing")) {
                                inner.className = "inner";
                            } else {
                                inner.className = "inner showing";
                            }
                        }
                    }
                }
            </script>
        </div>
