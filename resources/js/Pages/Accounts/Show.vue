<template>
  <app-layout>
    <div>
      <div class="mt-2 md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
          <h2 class="flex items-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
            <img
              :src="account.institution.logo"
              class="w-8 h-8 mr-2 rounded-full"
            /> {{ account.institution.name }}: {{ account.type.name }}
          </h2>
        </div>
        <span class="relative z-0 inline-flex rounded-md shadow-sm">
          <button class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md cursor-pointer hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
            <svg
              class="w-5 h-5"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 6v6m0 0v6m0-6h6m-6 0H6"
              ></path>
            </svg>
          </button>
        </span>
      </div>
    </div>
    <div class="mt-5">
      <h3 class="text-lg font-medium leading-6 text-gray-900">
        Last 30 days
      </h3>
      <div class="grid grid-cols-1 mt-5 overflow-hidden bg-white rounded-lg shadow md:grid-cols-3">
        <div>
          <div class="px-4 py-5 sm:p-6">
            <dl>
              <dt class="text-base font-normal leading-6 text-gray-900">
                Current Balance
              </dt>
              <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                <div class="flex items-baseline text-2xl font-semibold leading-8 text-blue-600">
                  $71,897.00
                </div>
                <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium leading-5 bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                  <svg
                    class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <span class="sr-only">
                    Increased by
                  </span>
                  $35.00
                </div>
              </dd>
            </dl>
          </div>
        </div>
        <div class="border-t border-gray-200 md:border-0 md:border-l">
          <div class="px-4 py-5 sm:p-6">
            <dl>
              <dt class="text-base font-normal leading-6 text-gray-900">
                This Month
              </dt>
              <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                <div class="flex items-baseline text-2xl font-semibold leading-8 text-blue-600">
                  $350.00
                </div>
                <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium leading-5 bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                  <svg
                    class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <span class="sr-only">
                    Increased by
                  </span>
                  $13.00
                </div>
              </dd>
            </dl>
          </div>
        </div>
        <div class="border-t border-gray-200 md:border-0 md:border-l">
          <div class="px-4 py-5 sm:p-6">
            <dl>
              <dt class="text-base font-normal leading-6 text-gray-900">
                Number of Transactions
              </dt>
              <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                <div class="flex items-baseline text-2xl font-semibold leading-8 text-blue-600">
                  23
                </div>
                <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium leading-5 bg-red-100 text-red-800 md:mt-2 lg:mt-0">
                  <svg
                    class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-red-500"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  <span class="sr-only">
                    Decreased by
                  </span>
                  4
                </div>
              </dd>
            </dl>
          </div>
        </div>
      </div>
      <div class="flex mt-5">

      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  props: ["account"],

  components: {
    AppLayout,
  },
};
</script>