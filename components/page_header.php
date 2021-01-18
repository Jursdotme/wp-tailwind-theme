<!--
  Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
  Read the documentation to get started: https://tailwindui.com/documentation
-->
<!-- This example requires Tailwind CSS v1.4.0+ -->
<div class="relative z-40 bg-white shadow">
  <div class="flex items-center justify-end px-4 py-6 sm:px-6 lg:justify-center md:space-x-10">
    <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-4">
      <a href="/" class="flex">
        <img class="w-auto h-10 sm:h-16" src="<?= get_template_directory_uri(); ?>/resources/svg/Logo.svg" alt="Steffen Sten Logo" />
      </a>
    </div>
    <div class="hidden lg:self-center md:flex md:items-center md:justify-start md:space-x-12">
      <nav class="hidden py-4 space-x-10 md:flex">
        <?php
        wp_nav_menu(
          array(
            'container' => false,
            'items_wrap' => '%3$s',
            'menu_class' => 'hidden space-x-10 md:flex',
            'theme_location' => 'menu-1',
            'menu_id'        => 'primary-menu',
            'walker' => new Nav_Main_Walker()
          )
        );
        ?>
      </nav>
    </div>
    <div class="items-center flex-1 hidden space-x-2 md:absolute md:inset-y-0 md:right-4 lg:flex">
      <span><svg class="w-6 h-6 text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
        </svg></span>
      <span class="text-xl font-semibold text-brand-600 lining-nums">(+45) 65 91 64 30</span>
    </div>
    <div class="-my-2 -mr-2 md:hidden" x-data="{ open: false }">
      <button @click="open = true" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
        <!-- Heroicon name: menu -->
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <!--
        Mobile menu, show/hide based on mobile menu state.

        Entering: "duration-200 ease-out"
          From: "opacity-0 scale-95"
          To: "opacity-100 scale-100"
        Leaving: "duration-100 ease-in"
          From: "opacity-100 scale-100"
          To: "opacity-0 scale-95"
      -->
      <div x-show="open" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" @click.away="open = false" class="absolute inset-x-0 top-0 p-2 transition origin-top-right transform md:hidden">
        <div class="rounded-lg shadow-lg">
          <div class="bg-white divide-y-2 rounded-lg shadow-xs divide-gray-50">
            <div class="px-5 pt-5 pb-6 space-y-6">
              <div class="flex items-center justify-between">
                <div>
                  <img class="w-auto h-10 sm:h-16" src="<?= get_template_directory_uri(); ?>/resources/svg/Logo.svg" alt="Steffen Sten Logo" />
                </div>
                <div class="-mr-2">
                  <button @click="open = false" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <!-- Heroicon name: x -->
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
              <div>
                <nav class="grid grid-cols-1 gap-7">

                  <?php
                  wp_nav_menu(
                    array(
                      'container' => false,
                      'items_wrap' => '%3$s',
                      'theme_location' => 'menu-2',
                      'menu_id'        => 'primary-menu',
                      'walker' => new Nav_Mobile_Walker()
                    )
                  );
                  ?>

                </nav>
              </div>
            </div>
            <div class="px-5 py-6 space-y-6">
              <div class="grid grid-cols-2 gap-4">
                <?php
                wp_nav_menu(
                  array(
                    'container' => false,
                    'items_wrap' => '%3$s',
                    'theme_location' => 'menu-2b',
                    'menu_id'        => 'primary-menu',
                    'walker' => new Nav_Mobile_Secondary_Walker()
                  )
                );
                ?>
              </div>
              <!-- <div class="space-y-6">
                <span class="flex w-full rounded-md shadow-sm">
                  <a href="#" class="flex items-center justify-center w-full px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-brand-600 hover:bg-brand-500 focus:outline-none focus:border-brand-700 focus:shadow-outline-brand active:bg-brand-700">
                    Sign up
                  </a>
                </span>
                <p class="text-base font-medium text-center text-gray-500 lead ing-6">
                  Existing customer?
                  <a href="#" class="transition duration-150 ease-in-out text-brand-600 hover:text-brand-500">
                    Sign in
                  </a>
                </p>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


</div>


<pre class="hidden">
<nav class="hidden space-x-10 md:flex">

<div class="relative" x-data="{ open: false }">
  <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
  <button @click="open = true" type="button" class="inline-flex items-center space-x-2 text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out group hover:text-gray-900 focus:outline-none focus:text-gray-900">
    <span>Solutions</span>
    <!--
      Heroicon name: chevron-down

      Item active: "text-gray-600", Item inactive: "text-gray-400"
    -->
    <svg class="w-5 h-5 text-gray-400 transition duration-150 ease-in-out group-hover:text-gray-500 group-focus:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>

  <!--
    'Solutions' flyout menu, show/hide based on flyout menu state.

    Entering: "transition ease-out duration-200"
      From: "opacity-0 translate-y-1"
      To: "opacity-100 translate-y-0"
    Leaving: "transition ease-in duration-150"
      From: "opacity-100 translate-y-0"
      To: "opacity-0 translate-y-1"
  -->
  <div x-show="open"
  @click.away="open = false" class="absolute w-screen max-w-md mt-3 -ml-4 transform md:max-w-3xl lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
    <div class="rounded-lg shadow-lg">
      <div class="overflow-hidden rounded-lg shadow-xs">
        <div class="relative z-20 grid gap-6 px-5 py-6 bg-white sm:gap-8 sm:p-8 lg:grid-cols-2">
          <a href="#" class="flex items-start p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg hover:bg-gray-50">
            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-md bg-brand-500 sm:h-12 sm:w-12">
              <!-- Heroicon name: chart-bar -->
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
              </svg>
            </div>
            <div class="space-y-1">
              <p class="text-base font-medium leading-6 text-gray-900">
                Analytics
              </p>
              <p class="text-sm leading-5 text-gray-500">
                Get a better understanding of where your traffic is coming from.
              </p>
            </div>
          </a>
          <a href="#" class="flex items-start p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg hover:bg-gray-50">
            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-md bg-brand-500 sm:h-12 sm:w-12">
              <!-- Heroicon name: cursor-click -->
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
              </svg>
            </div>
            <div class="space-y-1">
              <p class="text-base font-medium leading-6 text-gray-900">
                Engagement
              </p>
              <p class="text-sm leading-5 text-gray-500">
                Speak directly to your customers in a more meaningful way.
              </p>
            </div>
          </a>
          <a href="#" class="flex items-start p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg hover:bg-gray-50">
            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-md bg-brand-500 sm:h-12 sm:w-12">
              <!-- Heroicon name: shield-check -->
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
              </svg>
            </div>
            <div class="space-y-1">
              <p class="text-base font-medium leading-6 text-gray-900">
                Security
              </p>
              <p class="text-sm leading-5 text-gray-500">
                Your customers data will be safe and secure.
              </p>
            </div>
          </a>
          <a href="#" class="flex items-start p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg hover:bg-gray-50">
            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-md bg-brand-500 sm:h-12 sm:w-12">
              <!-- Heroicon name: view-grid -->
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
              </svg>
            </div>
            <div class="space-y-1">
              <p class="text-base font-medium leading-6 text-gray-900">
                Integrations
              </p>
              <p class="text-sm leading-5 text-gray-500">
                Connect with third-party tools that you’re already using.
              </p>
            </div>
          </a>
          <a href="#" class="flex items-start p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg hover:bg-gray-50">
            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-md bg-brand-500 sm:h-12 sm:w-12">
              <!-- Heroicon name: refresh -->
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
              </svg>
            </div>
            <div class="space-y-1">
              <p class="text-base font-medium leading-6 text-gray-900">
                Automations
              </p>
              <p class="text-sm leading-5 text-gray-500">
                Build strategic funnels that will drive your customers to convert
              </p>
            </div>
          </a>
          <a href="#" class="flex items-start p-3 -m-3 space-x-4 transition duration-150 ease-in-out rounded-lg hover:bg-gray-50">
            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white rounded-md bg-brand-500 sm:h-12 sm:w-12">
              <!-- Heroicon name: document-report -->
              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <div class="space-y-1">
              <p class="text-base font-medium leading-6 text-gray-900">
                Reports
              </p>
              <p class="text-sm leading-5 text-gray-500">
                Get detailed reports that will help you make more informed decisions
              </p>
            </div>
          </a>
        </div>
        <div class="p-5 bg-gray-50 sm:p-8">
          <a href="#" class="flow-root p-3 -m-3 space-y-1 transition duration-150 ease-in-out rounded-md hover:bg-gray-100">
            <div class="flex items-center space-x-3">
              <div class="text-base font-medium leading-6 text-gray-900">
                Enterprise
              </div>
              <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium leading-5 bg-brand-100 text-brand-800">
                New
              </span>
            </div>
            <p class="text-sm leading-5 text-gray-500">
              Empower your entire team with even more advanced tools.
            </p>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<a href="#" class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-gray-900 focus:outline-none focus:text-gray-900">
  Pricing
</a>
<a href="#" class="text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out hover:text-gray-900 focus:outline-none focus:text-gray-900">
  Docs
</a>

<div class="relative" x-data="{ open: false }">
  <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
  <button @click="open = true"type="button" class="inline-flex items-center space-x-2 text-base font-medium leading-6 text-gray-500 transition duration-150 ease-in-out group hover:text-gray-900 focus:outline-none focus:text-gray-900">
    <span>More</span>
    <!--
      Heroicon name: chevron-down

      Item active: "text-gray-600", Item inactive: "text-gray-400"
    -->
    <svg class="w-5 h-5 text-gray-400 transition duration-150 ease-in-out group-hover:text-gray-500 group-focus:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </button>
  <!--
    'More' flyout menu, show/hide based on flyout menu state.

    Entering: "transition ease-out duration-200"
      From: "opacity-0 translate-y-1"
      To: "opacity-100 translate-y-0"
    Leaving: "transition ease-in duration-150"
      From: "opacity-100 translate-y-0"
      To: "opacity-0 translate-y-1"
  -->
  <div x-show="open"
  @click.away="open = false" class="absolute w-screen max-w-xs px-2 mt-3 transform -translate-x-1/2 left-1/2 sm:px-0">
    <div class="rounded-lg shadow-lg">
      <div class="overflow-hidden rounded-lg shadow-xs">
        <div class="relative z-20 grid gap-6 px-5 py-6 bg-white sm:gap-8 sm:p-8">
          <a href="#" class="block p-3 -m-3 space-y-1 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
            <p class="text-base font-medium leading-6 text-gray-900">
              Blog
            </p>
            <p class="text-sm leading-5 text-gray-500">
              Learn about tips, product updates and company culture.
            </p>
          </a>
          <a href="#" class="block p-3 -m-3 space-y-1 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
            <p class="text-base font-medium leading-6 text-gray-900">
              Help Center
            </p>
            <p class="text-sm leading-5 text-gray-500">
              Get all of your questions answered in our forums of contact support.
            </p>
          </a>
          <a href="#" class="block p-3 -m-3 space-y-1 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
            <p class="text-base font-medium leading-6 text-gray-900">
              Guides
            </p>
            <p class="text-sm leading-5 text-gray-500">
              Learn how to maximize our platform to get the most out of it.
            </p>
          </a>
          <a href="#" class="block p-3 -m-3 space-y-1 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
            <p class="text-base font-medium leading-6 text-gray-900">
              Events
            </p>
            <p class="text-sm leading-5 text-gray-500">
              Check out webinars with experts and learn about our annual conference.
            </p>
          </a>
          <a href="#" class="block p-3 -m-3 space-y-1 transition duration-150 ease-in-out rounded-md hover:bg-gray-50">
            <p class="text-base font-medium leading-6 text-gray-900">
              Security
            </p>
            <p class="text-sm leading-5 text-gray-500">
              Understand how we take your privacy seriously.
            </p>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</nav>
</pre>