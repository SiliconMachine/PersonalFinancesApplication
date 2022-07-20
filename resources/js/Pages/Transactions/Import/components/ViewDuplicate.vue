<template>
  <app-modal
    :size="'medium'"
    :show="show"
  >
    <template v-slot:image>
      <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-blue-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="w-6 h-6 text-blue-600"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
          />
        </svg>
      </div>
    </template>
    <template v-slot:header>
      Check Potential Duplicate
    </template>
    <template v-slot:body>
      <div
        class="flex flex-col"
        v-if="key !== null"
      >
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                    >
                      Field
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                    >
                      Existing
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                    >
                      New
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                      Amount
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                      {{ formatMoney( Math.abs( parseFloat( transaction.amount ) ) ) }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                      {{ formatMoney( Math.abs( parseFloat( transaction.potential_duplicate.amount ) ) ) }}
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                      Date
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                      {{ formatDate( transaction.date ) }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                      {{ formatDate( transaction.potential_duplicate.date ) }}
                    </td>
                  </tr>
                  <tr>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                      Name
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                      {{ transaction.name }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                      {{ transaction.potential_duplicate.name }}
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </template>
    <template v-slot:footer>
      <button
        v-on:click="cancel()"
        type="button"
        class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
      >
        Cancel
      </button>
      <button
        v-on:click="remove()"
        type="button"
        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
      >
        Remove
      </button>
    </template>
  </app-modal>
</template>

<script>
import AppModal from "../../../../Components/Global/AppModal.vue";
import { EventBus } from "../../../../event-bus.js";
import { FormatMoney } from "../../../../Mixins/formatMoney";
import moment from "moment";

export default {
  components: {
    AppModal,
  },

  mixins: [FormatMoney],

  data() {
    return {
      show: false,
      transaction: {},
      key: null,
    };
  },

  mounted() {
    this.bindEvents();
  },

  methods: {
    bindEvents() {
      EventBus.on(
        "view-potential-duplicate",
        function (data) {
          this.transaction = data.transaction;
          this.key = data.key;
          this.show = true;
        }.bind(this)
      );

      EventBus.on(
        "close-modal",
        function () {
          this.show = false;
        }.bind(this)
      );
    },

    formatDate(date) {
      return moment(date).format("MM/DD/YYYY");
    },

    remove() {
      EventBus.emit("remove-transaction", this.key);
      this.cancel();
    },

    cancel() {
      this.key = null;
      this.show = false;
      this.transaction = {};

      EventBus.emit("close-modal");
    },
  },
};
</script>