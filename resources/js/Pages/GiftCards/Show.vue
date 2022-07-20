<template>
  <app-layout>
    <div v-if="loaded">
      <div class="mt-2 md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
          <h2 class="flex items-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
            <img
              :src="'https://logo.clearbit.com/'+giftCard.company.toLowerCase()+'.com'"
              class="w-8 h-8 mr-2 rounded-full"
            /> {{ giftCard.company }}
          </h2>
        </div>
        <span class="relative z-0 inline-flex rounded-md shadow-sm">
          <button
            v-on:click="promptEdit()"
            class="relative inline-flex items-center px-4 py-3 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md cursor-pointer hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="w-4 h-4 mr-px"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
              />
            </svg>

            Edit Gift Card
          </button>
        </span>
      </div>
    </div>
    <div
      class="max-w-lg mt-5"
      v-if="loaded"
    >
      <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Gift Card Details</h3>
          <p class="max-w-2xl mt-1 text-sm text-gray-500">Location, balance, url, etc.</p>
        </div>
        <div class="border-t border-gray-200">
          <dl>
            <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Balance</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">${{ giftCard.balance }}</dd>
            </div>
            <div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Location</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ giftCard.location }}</dd>
            </div>
            <div
              class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
              v-if="giftCard.expiration"
            >
              <dt class="text-sm font-medium text-gray-500">Expires</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ giftCard.expiration }}</dd>
            </div>
            <div class="px-4 py-5 bg-white sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">URL</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <a
                  :href="giftCard.url"
                  class="underline"
                  v-text="'Link to Gift Card'"
                  target="_blank"
                ></a>
              </dd>
            </div>
          </dl>
        </div>
      </div>

      <a
        href="https://clearbit.com"
        target="_blank"
        class="text-xs text-gray-900"
      >Logos provided by Clearbit</a>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import GiftCardsAPI from "@/api/giftCards.js";

export default {
  props: ["id"],

  data() {
    return {
      giftCard: {},
      loaded: false,
    };
  },

  components: {
    AppLayout,
  },

  mounted() {
    this.loadGiftCard();
  },

  methods: {
    promptEdit() {},

    loadGiftCard() {
      GiftCardsAPI.show(this.id).then(
        function (response) {
          this.giftCard = response.data;
          this.loaded = true;
        }.bind(this)
      );
    },
  },
};
</script>