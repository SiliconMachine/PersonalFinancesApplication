<template>
  <app-modal
    :size="'medium'"
    :show="show"
  >
    <template v-slot:image>
      <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-blue-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
        <!-- Heroicon name: exclamation -->
        <svg
          class="w-6 h-6 text-blue-600"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          aria-hidden="true"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
          ></path>
        </svg>
      </div>
    </template>
    <template v-slot:header>
      Add Transaction
    </template>
    <template v-slot:body>
      <form class="grid grid-cols-1 gap-4 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label
            for="acount"
            class="block text-sm font-medium leading-5 text-gray-700"
          >
            Account
          </label>
          <account-select
            v-model="form.account"
            :accounts="accounts"
          />
        </div>
        <div class="sm:col-span-3">
          <label
            for="direction"
            class="block text-sm font-medium text-left text-gray-700"
          >Direction</label>
          <select
            id="direction"
            v-model="form.direction"
            class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
          >
            <option value="all">All</option>
            <option value="outflow">Outflow</option>
            <option value="inflow">Inflow</option>
            <option value="transfer">Transfer</option>
          </select>
        </div>
        <div class="sm:col-span-3">
          <div>
            <label
              for="amount"
              class="block text-sm font-medium text-gray-700"
            >
              Amount
            </label>
            <div class="flex mt-1 rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
                $
              </span>
              <input
                type="text"
                name="amount"
                id="amount"
                v-model="form.amount"
                class="flex-1 block w-full min-w-0 px-3 py-2 border-gray-300 rounded-none rounded-r-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
              />
            </div>
          </div>
        </div>
        <div class="sm:col-span-3">
          <div>
            <label
              for="date"
              class="block text-sm font-medium leading-5 text-gray-700"
            >Date</label>
            <div class="flex mt-1 rounded-md shadow-sm">
              <span class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
                <svg
                  class="w-4 h-4"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                  ></path>
                </svg>
              </span>
              <input
                type="text"
                name="date"
                id="date"
                v-model="form.date"
                class="flex-1 block w-full min-w-0 px-3 py-2 border-gray-300 rounded-none rounded-r-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
              />
            </div>
          </div>
        </div>
        <div class="sm:col-span-6">
          <label
            for="name"
            class="block text-sm font-medium leading-5 text-gray-700"
          >
            Name
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input
              v-model="form.name"
              type="text"
              class="flex-1 block w-full min-w-0 px-3 py-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
            >
          </div>
        </div>
        <div class="sm:col-span-6">
          <label
            for="description"
            class="block text-sm font-medium leading-5 text-gray-700"
          >
            Description
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <textarea
              id="description"
              v-model="form.description"
              rows="3"
              class="block w-full border-gray-300 rounded-md shadow-sm"
            ></textarea>
          </div>
        </div>
        <div class="sm:col-span-3">
          <label
            for="tags"
            class="block text-sm font-medium leading-5 text-gray-700"
          >
            Category
          </label>
          <category-select v-model="form.category" />
        </div>
        <div class="sm:col-span-3">
          <label
            for="tags"
            class="block text-sm font-medium leading-5 text-gray-700"
          >
            Update Account Balance
          </label>
          <select
            id="update-account-balance"
            v-model="form.update_balance"
            name="update-account-balance"
            class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
          >
            <option value=""></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
          </select>
          <span
            v-if="Object.keys( form.account ).length > 0"
            v-text="'New balance: $'+newAccountBalance"
            class="text-sm italic text-gray-500"
          ></span>
        </div>
      </form>
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
        v-on:click="addTransaction()"
        type="button"
        class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
      >
        Add
      </button>
    </template>
  </app-modal>
</template>

<script>
import { EventBus } from "@/event-bus.js";

import AppModal from "@/Components/Global/AppModal.vue";
import AccountsAPI from "@/api/accounts.js";
import AccountSelect from "@/Components/Global/AccountSelect.vue";
import TransactionsAPI from "@/api/transactions.js";
import CategorySelect from "@/Components/Categories/CategorySelect.vue";

export default {
  components: {
    AppModal,
    AccountSelect,
    CategorySelect,
  },

  data() {
    return {
      accounts: [],
      show: false,

      form: {
        account: {},
        date: "",
        amount: 0.0,
        direction: "outflow",
        name: "",
        description: "",
        category: "",
        tags: [],
        update_balance: "yes",
      },
    };
  },

  mounted() {
    this.bindEvents();
    this.loadAccounts();
  },

  beforeDestroy() {
    EventBus.off("prompt-add-transaction");
    EventBus.off("close-modal");
  },

  computed: {
    newAccountBalance() {
      let amount = parseFloat(this.form.amount);
      let currentBalance = parseFloat(this.form.account.current_balance);

      if (this.form.direction == "outflow") {
        return parseFloat(currentBalance) - parseFloat(amount);
      } else if (this.form.direction == "inflow") {
        return parseFloat(currentBalance) + parseFloat(amount);
      }
    },
  },

  methods: {
    bindEvents() {
      EventBus.on(
        "prompt-add-transaction",
        function () {
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

    loadAccounts() {
      AccountsAPI.index().then(
        function (response) {
          this.accounts = response.data;
        }.bind(this)
      );
    },

    cancel() {
      this.show = false;
      this.resetForm();
      EventBus.emit("close-modal");
    },

    addTransaction() {
      TransactionsAPI.store(this.form).then(
        function (response) {
          EventBus.emit("load-transactions");
          EventBus.emit("notify", {
            type: "success",
            title: "Transaction Added",
            message: "Your transaction was added successfully.",
            action: "clear",
          });
          this.cancel();
        }.bind(this)
      );
    },

    resetForm() {
      this.form.account = {};
      this.form.date = "";
      this.form.amount = 0.0;
      this.form.direction = "outflow";
      this.form.name = "";
      this.form.description = "";
      this.form.tags = [];
      this.form.update_balance = "yes";
    },
  },
};
</script>