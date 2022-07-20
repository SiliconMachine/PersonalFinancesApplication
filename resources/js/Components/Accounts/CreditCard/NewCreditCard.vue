<template>
  <div class="grid grid-cols-1 gap-4 sm:grid-cols-6 sm:col-span-6">
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
          id="name"
          type="text"
          v-bind:class="{ 'border-red-500': !validations.name.valid }"
          class="block w-full border-gray-300 rounded-md shadow-sm"
        >
      </div>
      <span
        class="text-sm text-red-500"
        v-show="!validations.name.valid"
        v-text="validations.name.message"
      ></span>
    </div>
    <div class="sm:col-span-6">
      <label
        for="number"
        class="block text-sm font-medium leading-5 text-gray-700"
      >
        Number
      </label>
      <div class="mt-1 rounded-md shadow-sm">
        <input
          v-model="form.number"
          v-bind:class="{ 'border-red-500': !validations.number.valid }"
          id="number"
          type="text"
          class="block w-full border-gray-300 rounded-md shadow-sm"
        >
      </div>
      <span
        class="text-sm text-red-500"
        v-show="!validations.number.valid"
        v-text="validations.number.message"
      ></span>
    </div>
    <div class="sm:col-span-6">
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
          v-bind:class="{ 'border-red-500': !validations.institution.valid }"
          class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
        >
          <option value=""></option>
          <option
            v-for="(institution, key) in institutions"
            v-bind:key="'institution-'+key"
            v-bind:value="institution.id"
            v-text="institution.name"
          />
        </select>
      </div>
      <span
        class="text-sm text-red-500"
        v-show="!validations.institution.valid"
        v-text="validations.institution.message"
      ></span>
    </div>
    <div class="sm:col-span-6">
      <label
        for="description"
        class="block text-sm font-medium leading-5 text-gray-700"
      >
        Description
      </label>
      <div class="mt-1 rounded-md shadow-sm">
        <input
          v-model="form.description"
          v-bind:class="{ 'border-red-500': !validations.description.valid }"
          id="description"
          type="text"
          class="block w-full border-gray-300 rounded-md shadow-sm"
        >
      </div>
      <span
        class="text-sm text-red-500"
        v-show="!validations.description.valid"
        v-text="validations.description.message"
      ></span>
    </div>
    <div class="sm:col-span-3">
      <div>
        <label
          for="interest-rate"
          class="block text-sm font-medium text-gray-700"
        >
          Interest Rate
        </label>
        <div class="flex mt-1 rounded-md shadow-sm">
          <span class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
            %
          </span>
          <input
            type="text"
            name="interest-rate"
            id="interest-rate"
            v-model="form.interest_rate"
            class="flex-1 block w-full min-w-0 px-3 py-2 border-gray-300 rounded-none rounded-r-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
          />
        </div>
        <span
          class="text-sm text-red-500"
          v-show="!validations.interest_rate.valid"
          v-text="validations.interest_rate.message"
        ></span>
      </div>
    </div>
    <div class="sm:col-span-3">
      <div>
        <label
          for="amount"
          class="block text-sm font-medium text-gray-700"
        >
          Current Balance
        </label>
        <div class="flex mt-1 rounded-md shadow-sm">
          <span class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
            $
          </span>
          <input
            type="text"
            name="current-balance"
            id="current-balance"
            v-model="form.current_balance"
            class="flex-1 block w-full min-w-0 px-3 py-2 border-gray-300 rounded-none rounded-r-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
          />
        </div>
        <span
          class="text-sm text-red-500"
          v-show="!validations.current_balance.valid"
          v-text="validations.current_balance.message"
        ></span>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "@/event-bus.js";
import CreditCardAPI from "@/api/creditCards.js";

export default {
  props: ["institutions"],

  data() {
    return {
      form: {
        name: "",
        number: "",
        institution: "",
        description: "",
        interest_rate: "",
        current_balance: "",
      },

      validations: {
        name: {
          valid: true,
          message: "Enter a name for this account",
        },
        number: {
          valid: true,
          message: "Please enter an account number",
        },
        institution: {
          valid: true,
          message: "Please select the institution that provides your account.",
        },
        description: {
          valid: true,
          message: "Please enter a description",
        },
        interest_rate: {
          valid: true,
          message: "Enter the interest rate for your loan",
        },
        current_balance: {
          valid: true,
          message: "Enter the current balance of your account",
        },
      },
    };
  },

  mounted() {
    EventBus.on(
      "add-credit-card",
      function () {
        this.add();
      }.bind(this)
    );

    EventBus.on(
      "reset-form",
      function () {
        this.resetForm();
      }.bind(this)
    );

    EventBus.on(
      "reset-validations",
      function () {
        this.resetValidations();
      }.bind(this)
    );
  },

  methods: {
    add() {
      if (this.validate()) {
        CreditCardAPI.store(this.form)
          .then(
            function (message) {
              this.notify();
              this.reloadAccounts();
              this.resetForm();
              this.resetValidations();
              this.hideModal();
            }.bind(this)
          )
          .catch(
            function (error) {
              this.setServerSideValidations(error.response.data.errors);
            }.bind(this)
          );
      }
    },

    validate() {
      let validAccount = true;

      if (this.form.name == "") {
        validAccount = false;
        this.validations.name.valid = false;
      } else {
        this.validations.name.valid = true;
      }

      if (this.form.number == "") {
        validAccount = false;
        this.validations.number.valid = false;
      } else {
        this.validations.number.valid = true;
      }

      if (this.form.description == "") {
        validAccount = false;
        this.validations.description.valid = false;
      } else {
        this.validations.description.valid = true;
      }

      if (this.form.institution == "") {
        validAccount = false;
        this.validations.institution.valid = false;
      } else {
        this.validations.institution.valid = true;
      }

      if (this.form.interest_rate == "") {
        validAccount = false;
        this.validations.interest_rate.valid = false;
      } else {
        this.validations.interest_rate.valid = true;
      }

      if (this.form.current_balance == "") {
        validAccount = false;
        this.validations.current_balance.valid = false;
      } else {
        this.validations.current_balance.valid = true;
      }

      return validAccount;
    },

    notify() {
      EventBus.emit("notify", {
        type: "success",
        title: "Account Added",
        message:
          "You can now add transactions, set goals, and budget for this account!",
        action: "close",
      });
    },

    reloadAccounts() {
      EventBus.emit("reload-accounts");
    },

    resetForm() {
      this.form.name = "";
      this.form.number = "";
      this.form.institution = "";
      this.form.description = "";
      this.form.interest_rate = "";
      this.form.current_balance = "";
    },

    resetValidations() {
      this.validations.name.valid = true;
      this.validations.number.valid = true;
      this.validations.institution.valid = true;
      this.validations.description.valid = true;
      this.validations.interest_rate.valid = true;
      this.validations.current_balance.valid = true;
    },

    hideModal() {
      EventBus.emit("close-modal");
    },

    setServerSideValidations(errors) {
      for (const [key, value] of Object.entries(errors)) {
        this.validations[key].valid = false;
        this.validations[key].message = value[0];
      }
    },
  },
};
</script>