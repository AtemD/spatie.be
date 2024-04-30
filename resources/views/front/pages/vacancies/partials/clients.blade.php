<h3 class="title">The best is yet to come</h3>
<p>
    We don't take on just any new project but only those where we all can learn something new.
    We love to work with the latest and greatest. Here are some examples of exciting stuff you could be working on:</p>
<ul class="bullets bullets-green">
    @if($profile == 'front' || $profile == 'back')
        <li><span class="icon">{{ app_svg('icons/far-angle-right') }}</span> In-house applications for the Laravel
            ecosystem like <a href="https://myray.app" target="_blank" rel="noopener nofollow">Ray</a>, <a
                    href="https://mailcoach.app" target="_blank" rel="noopener nofollow">Mailcoach</a> or <a
                    href="https://flareapp.io" target="_blank" rel="noopener nofollow">Flare</a></li>
        <li><span class="icon">{{ app_svg('icons/far-angle-right') }}</span> Web apps for Tomorrowland</li>
        <li><span class="icon">{{ app_svg('icons/far-angle-right') }}</span> A large community platform for a US client
        </li>
    @endif

    @if($profile == 'front')
        <li><span class="icon">{{ app_svg('icons/far-angle-right') }}</span> The design of online courses for a Laravel
            audience
        </li>
    @endif
    @if($profile == 'back')
        <li><span class="icon">{{ app_svg('icons/far-angle-right') }}</span> Development of online courses for a Laravel
            audience
        </li>
    @endif
    @if($profile == 'marketing')
        <li><span class="icon">{{ app_svg('icons/far-angle-right') }}</span> Growth of our in-house applications for the
            Laravel ecosystem like <a href="https://myray.app" target="_blank" rel="noopener nofollow">Ray</a>, <a
                    href="https://mailcoach.app" target="_blank" rel="noopener nofollow">Mailcoach</a> or <a
                    href="https://flareapp.io" target="_blank" rel="noopener nofollow">Flare</a></li>
        <li><span class="icon">{{ app_svg('icons/far-angle-right') }}</span> Promotion of online courses for a Laravel
            audience
        </li>
    @endif

    <li><span class="icon">{{ app_svg('icons/far-angle-right') }}</span> Our enormous collection of <a
                href="{{ route('open-source.packages') }}">open-source packages</a> and projects</li>
</ul>

<p>
    You'll have a say in what you'll be working on. No really, we áre listening.
    @if($profile == 'back')
        If you're curious to see how we work, these public <a href="https://spatie.be/guidelines">guidelines</a> could
        give you a first impression.
    @endif
    @if($profile == 'front')
        If you're curious to see what we create, check out a selection of work on <a href="https://spatie.be">our
            homepage</a>.
    @endif
</p>






