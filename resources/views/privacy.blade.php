@extends('partials.headers.private')


@section('private_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <nav aria-label="breadcrumb" class="bg-light">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                    </ol>
                </nav>
                <div class="mainBody" style="margin-top:-5px;">
                    <br>
                    <h1>Privacy Policy</h1>
                    <p></p>
                    {{ config()->get('services.application.slugName') }} has established this privacy policy to explain to
                    you how your information is protected,
                    collected and used, which may be updated by {{ config()->get('services.application.slugName') }} from
                    time to time. {{ config()->get('services.application.slugName') }} will provide
                    notice of materially significant changes to this privacy policy by posting notice on our site.
                    <p></p>
                    <h3>1. Protecting your privacy</h3>
                    <p style="overflow:auto"></p>
                    <ul>
                        <li>We do run banner ads, pop ups, pop unders, or any other kind of commercial ads.</li>
                        <li>We do not share your information with third parties for marketing purposes.</li>
                        <li>We do engage in cross-marketing or link-referral programs with other sites.</li>
                        <li>We do employ tracking devices for marketing purposes ("cookies", "web beacons," single-pixel
                            gifs).</li>
                        <li>We do send you unsolicited communications for marketing purposes. Newsletters are sent if you
                            subscribe to it only.</li>
                        <li>{{ config()->get('services.application.slugName') }} do not knowingly collect any information
                            from persons under the age of 13. If we
                            learns that a posting is by a person under the age of 13,
                            {{ config()->get('services.application.slugName') }} will remove that post.
                        </li>
                        <li>{{ config()->get('services.application.slugName') }}, or people who post on this website, may
                            provide links to third party websites,
                            which may have different privacy practices. We are not responsible for, nor have any control
                            over, the privacy policies of those third party websites, and encourage all users to read the
                            privacy policies of each and every website visited.
                        </li>
                    </ul>
                    <p></p>
                    <h3>2. Data we collect</h3>
                    <p>
                    </p>
                    <ul>
                        <li>We sometimes collect your email address, for purposes such as sending self-publishing and
                            confirmation emails, providing subscription email services, etc.</li>
                        <li>For paid postings, we collect contact information, such as name(s), phone/fax number(s), and
                            address for billing purposes.</li>
                        <li>{{ config()->get('services.application.slugName') }} does not store credit card information.
                            Credit card transactions are transmitted to
                            a financial gateway, and we endeavor to protect the security of your payment information during
                            transmission by using Secure Sockets Layer (SSL) technology.</li>
                        <li>We may collect personal information if you provide it in feedback or comments, post it on our
                            classifieds or if you contact us directly. Please do not post any personal information on
                            classifieds posts that you expect to keep private.</li>
                        <li>Our web logs collect standard web log entries for each page served, including your IP address,
                            page URL, and timestamp. Web logs help us to diagnose problems with our server, to administer
                            our website, and to otherwise provide our service to you.</li>
                    </ul>
                    <p></p>
                    <h3>3. Data we store</h3>
                    <p>
                    </p>
                    <ul>
                        <li>All classified postings are stored in our database, even after "deletion," and may be archived
                            elsewhere.</li>
                        <li>Our web logs and other records are stored indefinitely.</li>
                        <li>Although we make good faith efforts to store the information in a secure operating environment
                            that is not available to the public, we cannot guarantee complete security.</li>
                    </ul>
                    <p></p>
                    <h3>4. Archiving and display of {{ config()->get('services.application.slugName') }} postings by search
                        engines and other sites</h3>
                    <p>
                    </p>
                    <ul>
                        Search engines and other sites not affiliated with
                        {{ config()->get('services.application.slugName') }} - including archive.org, google.com,
                        and groups.yahoo.com - archive or otherwise make available
                        {{ config()->get('services.application.slugName') }} ad postings, including
                        resumes.
                    </ul>
                    <p></p>
                    <h3>5. Circumstances in which {{ config()->get('services.application.slugName') }} may release
                        information</h3>
                    <p>
                    </p>
                    <ul>
                        <li>We may disclose information about the users if required to do so by law or in the good faith
                            belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or
                            other legal process.</li>
                        <li>{{ config()->get('services.application.slugName') }} may also disclose information about its
                            users to law enforcement officers or others,
                            in the good faith belief that such disclosure is reasonably necessary to: enforce our Terms of
                            Use; respond to claims that any posting or other content violates the rights of third-parties;
                            or protect the rights, property, or personal safety of
                            {{ config()->get('services.application.slugName') }}, its users or the general
                            public.</li>
                    </ul>
                    <p></p>
                    <h3>6. International Users</h3>
                    <p></p>
                    <ul>
                        By visiting our web site and providing us with data, you acknowledge and agree that due to the
                        international dimension of our website we may use the data collected in the course of our
                        relationship for the purposes identified in this policy or in our other communications with you,
                        including the transmission of information outside your resident jurisdiction. In addition, please
                        understand that such data may be stored on servers located in the Netherlands. By providing us with
                        your data, you consent to the transfer of such data.
                    </ul>
                    <p></p>
                    <h3>7. Feedback and comments</h3>
                    <p></p>
                    <ul>
                        We welcome your feedback on this document in our <a href="/contact-us">contact form</a>. We would be
                        glad to explain you any terms for your better understanding.
                    </ul>
                    <p></p>
                </div>

            </div>
        </div>
        @include('partials.common.footer')
    </div>
@endsection
