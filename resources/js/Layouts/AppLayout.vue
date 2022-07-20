<template>
  <!--
        Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
        Read the documentation to get started: https://tailwindui.com/documentation
    -->
  <div class="flex h-screen overflow-hidden bg-gray-100">
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div
      class="md:hidden"
      v-show="showingResponsivePopOut"
    >
      <div class="fixed inset-0 z-40 flex">
        <!--
                    Off-canvas menu overlay, show/hide based on off-canvas menu state.

                    Entering: "transition-opacity ease-linear duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                    Leaving: "transition-opacity ease-linear duration-300"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
        <div class="fixed inset-0">
          <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
        </div>

        <!--
                    Off-canvas menu, show/hide based on off-canvas menu state.

                    Entering: "transition ease-in-out duration-300 transform"
                    From: "-translate-x-full"
                    To: "translate-x-0"
                    Leaving: "transition ease-in-out duration-300 transform"
                    From: "translate-x-0"
                    To: "-translate-x-full"
                -->
        <div class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-white">
          <div class="absolute top-0 right-0 p-1 -mr-14">
            <button
              v-on:click="showingResponsivePopOut = false"
              class="flex items-center justify-center w-12 h-12 rounded-full focus:outline-none focus:bg-gray-600"
              aria-label="Close sidebar"
            >
              <svg
                class="w-5 h-5 text-white"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
          <div class="flex items-center flex-shrink-0 px-4">
            <jet-application-mark class="block w-auto mx-auto h-9" />
          </div>
          <div class="flex-1 h-0 mt-5 overflow-y-auto">
            <nav class="space-y-1">
              <jet-responsive-nav-link href="/dashboard">
                <svg
                  class="w-6 h-6 mr-4 transition duration-150 ease-in-out text-astronaut-500 group-hover:text-astronaut-500 group-focus:text-astronaut-600"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  />
                </svg>
                Dashboard
              </jet-responsive-nav-link>

              <jet-responsive-nav-link href="/budgets">
                <svg
                  class="w-6 h-6 mr-4 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
                  ></path>
                </svg>
                Budgets
              </jet-responsive-nav-link>

              <jet-responsive-nav-link href="/transactions">
                <svg
                  class="w-6 h-6 mr-4 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                  ></path>
                </svg>
                Transactions
              </jet-responsive-nav-link>

              <!-- <jet-responsive-nav-link href="/goals">
                <svg
                  class="w-6 h-6 mr-4 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                  />
                </svg>
                Goals
              </jet-responsive-nav-link> -->

              <jet-responsive-nav-link href="/accounts">
                <svg
                  class="w-6 h-6 mr-4 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                  ></path>
                </svg>
                Accounts
              </jet-responsive-nav-link>
              <!-- 
              <jet-responsive-nav-link href="/reports">
                <svg
                  class="w-6 h-6 mr-4 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                  />
                </svg>
                Reports
              </jet-responsive-nav-link> -->

              <jet-responsive-nav-link href="/admin">
                <svg
                  class="w-6 h-6"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"
                  ></path>
                </svg>
                Platform Admin
              </jet-responsive-nav-link>
            </nav>
          </div>
        </div>
        <div class="flex-shrink-0 w-14">
          <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
      </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:flex-shrink-0">
      <div class="flex flex-col w-24">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto bg-white border-r border-gray-200">
          <div class="flex items-center flex-shrink-0 px-4">
            <jet-application-mark class="block w-auto mx-auto h-9" />
          </div>
          <div class="flex flex-col flex-grow mt-5">
            <nav class="flex-1 space-y-1 bg-white">
              <jet-nav-link
                href="/dashboard"
                :active="$page.currentRouteName == 'dashboard'"
              >
                <!-- Heroicon name: home -->
                <svg
                  class="w-5 h-5 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  />
                </svg>
                Dashboard
              </jet-nav-link>

              <jet-nav-link
                href="/budgets"
                :active="$page.currentRouteName == 'budget'"
              >
                <!-- Heroicon name: users -->
                <svg
                  class="w-5 h-5 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
                  ></path>
                </svg>
                Budgets
              </jet-nav-link>

              <!-- <jet-nav-link
                href="/goals"
                :active="$page.currentRouteName == 'goals'"
              >
                <svg
                  class="w-5 h-5 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                  />
                </svg>
                Goals
              </jet-nav-link> -->

              <jet-nav-link
                href="/transactions"
                :active="$page.currentRouteName == 'transactions'"
              >
                <!-- Heroicon name: folder -->
                <svg
                  class="w-5 h-5 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                  ></path>
                </svg>
                Transactions
              </jet-nav-link>

              <jet-nav-link
                href="/accounts"
                :active="$page.currentRouteName == 'accounts'"
              >
                <!-- Heroicon name: inbox -->
                <svg
                  class="w-5 h-5 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                  ></path>
                </svg>
                Accounts
              </jet-nav-link>

              <!-- <jet-nav-link
                href="/reports"
                :active="$page.currentRouteName == 'reports'"
              >
                <svg
                  class="w-5 h-5 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                  />
                </svg>
                Reports
              </jet-nav-link> -->

              <!-- <jet-nav-link
                href="/tools"
                :active="$page.currentRouteName == 'tools'"
              >
                <svg
                  class="w-5 h-5 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                  ></path>
                </svg>
                Tools
              </jet-nav-link> -->

              <jet-nav-link
                href="/admin"
                :active="$page.currentRouteName == 'admin'"
              >
                <svg
                  class="w-5 h-5 transition duration-150 ease-in-out text-astronaut-400 group-hover:text-astronaut-500 group-focus:text-astronaut-500"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"
                  ></path>
                </svg>
                Admin
              </jet-nav-link>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col flex-1 w-0 overflow-hidden">
      <div class="relative z-10 flex flex-shrink-0 h-16 bg-white shadow">
        <button
          v-on:click="showingResponsivePopOut = true"
          class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:bg-gray-100 focus:text-gray-600 md:hidden"
          aria-label="Open sidebar"
        >
          <svg
            class="w-6 h-6"
            stroke="currentColor"
            fill="none"
            viewBox="0 0 24 24"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h7"
            />
          </svg>
        </button>
        <div class="flex justify-between flex-1 px-4">
          <div class="flex flex-1">
            <form
              class="flex w-full md:ml-0"
              action="#"
              method="GET"
            >
              <label
                for="search_field"
                class="sr-only"
              >Search</label>
              <search />
            </form>
          </div>
          <div class="flex items-center ml-4 md:ml-6">
            <button
              class="p-1 text-gray-400 rounded-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:shadow-outline focus:text-gray-500"
              aria-label="Notifications"
            >
              <svg
                class="w-6 h-6"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                />
              </svg>
            </button>

            <!-- Profile dropdown -->
            <jet-dropdown
              align="right"
              width="48"
            >
              <template #trigger>
                <button class="flex text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                  <img
                    class="object-cover w-8 h-8 rounded-full"
                    :src="$page.props.user.profile_photo_url"
                    :alt="$page.props.user.name"
                  />
                </button>
              </template>

              <template #content>
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                  Manage Account
                </div>

                <jet-dropdown-link href="/user/profile">
                  Profile
                </jet-dropdown-link>

                <jet-dropdown-link
                  href="/user/api-tokens"
                  v-if="$page.props.jetstream.hasApiFeatures"
                >
                  API Tokens
                </jet-dropdown-link>

                <div v-if="$page.props.user.permission == 'admin'">
                  <div class="border-t border-gray-200"></div>

                  <div class="block px-4 py-2 text-xs text-gray-400">
                    App Settings
                  </div>

                  <jet-dropdown-link
                    :href="'/admin'"
                    :active="$page.currentRouteName == 'admin.show'"
                  >
                    Admin
                  </jet-dropdown-link>
                </div>

                <div class="border-t border-gray-100"></div>

                <!-- Authentication -->
                <form @submit.prevent="logout()">
                  <button
                    class="block w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                    type="submit"
                  >
                    Logout
                  </button>
                </form>
              </template>
            </jet-dropdown>
          </div>
        </div>
      </div>

      <main
        class="relative flex-1 overflow-y-auto focus:outline-none"
        tabindex="0"
      >
        <div class="pt-2 pb-6 md:py-6">
          <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
            <!-- Page Content -->
            <main>
              <slot></slot>
            </main>
          </div>
        </div>
      </main>

      <notification />
    </div>
  </div>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";
import Notification from "@/Components/Global/Notification";
import Search from "@/Components/Global/Search";

export default {
  components: {
    JetApplicationLogo,
    JetApplicationMark,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
    Notification,
    Search,
  },

  data() {
    return {
      showingNavigationDropdown: false,
      showingResponsivePopOut: false,
    };
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        "/current-team",
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      axios.post("/logout").then((response) => {
        window.location = "/";
      });
    },
  },

  computed: {
    path() {
      return window.location.pathname;
    },
  },
};
</script>
