<template>
  <app-layout>
    <div v-if="loaded">
      <div class="mt-2 md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
          <h2 class="flex items-center w-full text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
            <img
              :src="loan.institution.logo"
              class="w-8 h-8 mr-2 rounded-full"
            /> {{ loan.name }}
          </h2>
        </div>
        <span class="relative z-0 inline-flex rounded-md shadow-sm">
          <button class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 cursor-pointer rounded-l-md hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="w-5 h-5 mr-px"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 6v6m0 0v6m0-6h6m-6 0H6"
              />
            </svg>

            Add Transaction
          </button>
          <button
            v-on:click="promptEdit()"
            class="relative inline-flex items-center px-4 py-3 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 cursor-pointer rounded-r-md hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700"
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

            Edit Account
          </button>
        </span>
      </div>
    </div>
    <div
      class="mt-5"
      v-if="loaded"
    >
      <stats
        :account="loan"
        :type="'loan'"
        :fields="[
                    'current_balance',
                    'interest_rate',
                    'payment_amount'
                ]"
      />

      <div class="grid grid-cols-2 gap-4 mt-5">
        <transactions-table
          :account="loan"
          :columns="['amount', 'date', 'name', 'category']"
          :buttons="['filter', 'add']"
        />
      </div>
    </div>

    <edit />
  </app-layout>
</template>

<script>
import LoansAPI from "../../api/loans.js";
import AppLayout from "./../../Layouts/AppLayout";
import Stats from "../../Components/Accounts/Stats.vue";
import { EventBus } from "../../event-bus.js";
import Edit from "../../Components/Accounts/Loan/Edit.vue";
import TransactionsTable from "../../Components/Transactions/TransactionsTable.vue";

export default {
  props: ["id"],

  data() {
    return {
      loaded: false,
      loan: {},
    };
  },

  components: {
    AppLayout,
    Stats,
    Edit,
    TransactionsTable,
  },

  mounted() {
    this.bindEvents();
    this.loadLoan();
  },

  methods: {
    bindEvents() {
      EventBus.on(
        "loan-updated",
        function () {
          this.loadLoan();
        }.bind(this)
      );
    },

    promptEdit() {
      EventBus.emit("prompt-edit-account", this.loan);
    },

    loadLoan() {
      LoansAPI.show(this.id).then(
        function (response) {
          this.loan = response.data;
          this.loaded = true;
        }.bind(this)
      );
    },
  },
};
</script>