<template>
  <app-layout>
    <div class="max-w-3xl">
      <div>
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
          Add Account
        </h2>
        <p class="mt-1 text-sm leading-5 text-gray-500">
          Add an account that you own.
        </p>
      </div>
      <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-6 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label
            for="account-name"
            class="block text-sm font-medium leading-5 text-gray-700"
          >
            Name
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input
              v-model="form.name"
              id="account-name"
              name="account_name"
              type="text"
              class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
            >
          </div>
        </div>

        <div class="sm:col-span-3">
          <label
            for="account-type"
            class="block text-sm font-medium leading-5 text-gray-700"
          >
            Type
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <select
              id="type"
              v-model="form.type"
              class="block w-full transition duration-150 ease-in-out form-select sm:text-sm sm:leading-5"
            >
              <option value=""></option>
              <option value="cash">Cash</option>
              <option value="checking-account">Checking Account</option>
              <option value="savings-account">Savings Account</option>
              <option value="loan">Loan</option>
              <option value="credit-card">Credit Card</option>
            </select>
          </div>
        </div>

        <div
          class="sm:col-span-4"
          v-show="form.type != 'cash'"
        >
          <label
            for="account-number"
            class="block text-sm font-medium leading-5 text-gray-700"
          >
            Number
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input
              v-model="form.number"
              id="account-number"
              name="account_number"
              type="text"
              class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
            >
          </div>
        </div>

        <div
          class="sm:col-span-3"
          v-show="form.type != 'cash'"
        >
          <label
            for="institution"
            class="block text-sm font-medium leading-5 text-gray-700"
          >
            Institution
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <select
              id="institution"
              v-model="form.institution"
              class="block w-full transition duration-150 ease-in-out form-select sm:text-sm sm:leading-5"
            >
              <option value=""></option>
              <option
                v-for="institution in $page.institutions"
                v-bind:key="'institution-'+institution.id"
                v-bind:value="institution.id"
                v-text="institution.name"
              ></option>
            </select>
          </div>
        </div>
        <div
          class="sm:col-span-4"
          v-show="form.type == 'loan'"
        >
          <label
            for="open_date"
            class="block text-sm font-medium leading-5 text-gray-700"
          >
            Open Date
          </label>
          <div class="mt-1 rounded-md shadow-sm">
            <input
              v-model="form.open_date"
              id="open-date"
              name="open-date"
              type="text"
              class="block w-full transition duration-150 ease-in-out form-input sm:text-sm sm:leading-5"
            >
          </div>
        </div>
        <div class="sm:col-span-4">
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
              class="block w-full mt-1 transition duration-150 ease-in-out form-textarea sm:text-sm sm:leading-5"
            ></textarea>
          </div>
        </div>
        <div class="sm:col-span-3">
          <div>
            <label
              for="initial-balance"
              class="block text-sm font-medium leading-5 text-gray-700"
            >Initial Balance</label>
            <div class="relative mt-1 rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <span class="text-gray-500 sm:text-sm sm:leading-5">
                  $
                </span>
              </div>
              <input
                id="initial-balance"
                v-model="form.initial_balance"
                class="block w-full pr-12 form-input pl-7 sm:text-sm sm:leading-5"
                placeholder="0.00"
                aria-describedby="price-currency"
              >
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <span
                  class="text-gray-500 sm:text-sm sm:leading-5"
                  id="price-currency"
                >
                  USD
                </span>
              </div>
            </div>
          </div>
        </div>
        <div
          class="sm:col-span-3"
          v-show="form.type == 'loan' || form.type == 'credit-card'"
        >
          <div>
            <label
              for="interest-rate"
              class="block text-sm font-medium leading-5 text-gray-700"
            >Interest Rate</label>
            <div class="relative mt-1 rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <span class="text-gray-500 sm:text-sm sm:leading-5">
                  %
                </span>
              </div>
              <input
                id="interest-rate"
                v-model="form.interest_rate"
                class="block w-full pr-12 form-input pl-7 sm:text-sm sm:leading-5"
                placeholder="0.00"
                aria-describedby="price-currency"
              >

            </div>
          </div>
        </div>
        <div
          class="sm:col-span-3"
          v-show="form.type == 'loan'"
        >
          <div>
            <label
              for="payment-amount"
              class="block text-sm font-medium leading-5 text-gray-700"
            >Payment Amount</label>
            <div class="relative mt-1 rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <span class="text-gray-500 sm:text-sm sm:leading-5">
                  $
                </span>
              </div>
              <input
                id="payment-amount"
                v-model="form.payment_amount"
                class="block w-full pr-12 form-input pl-7 sm:text-sm sm:leading-5"
                placeholder="0.00"
                aria-describedby="price-currency"
              >
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <span
                  class="text-gray-500 sm:text-sm sm:leading-5"
                  id="price-currency"
                >
                  USD
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="sm:col-span-4">
          <button
            type="button"
            v-on:click="store()"
            class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-golden-grass-600 hover:bg-golden-grass-500 focus:outline-none focus:border-golden-grass-700 focus:shadow-outline-blue active:bg-golden-grass-700"
          >
            Add Account
          </button>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  props: ["csrf"],

  data() {
    return {
      form: {
        name: "",
        type: "",
        number: "",
        description: "",
        institution: "",
        open_date: "",
        payment_amount: 0.0,
        initial_balance: 0.0,
        interest_rate: 0.0,
      },
    };
  },

  components: {
    AppLayout,
  },

  methods: {
    store() {
      this.form._token = this.csrf;
      this.$inertia.post("/accounts", this.form);
    },
  },
};
</script>