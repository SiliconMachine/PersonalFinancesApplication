<template>
  <tr v-bind:class="{
            'bg-white': index % 2 == 0,
            'bg-gray-50': index % 2 == 1
        }">
    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
      <div
        v-if="!transaction.imported"
        class="flex items-center justify-between h-10"
      >
        <input
          type="checkbox"
          v-model="transaction.import"
        />
        <span
          v-if="transaction.potential_duplicate != null"
          v-on:click="viewDuplicate( transaction, key )"
          class="ml-1 cursor-pointer"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-6 h-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
            />
          </svg>
        </span>
      </div>
    </td>
    <td class="px-3 py-4 text-sm text-gray-500 capitalize whitespace-nowrap">
      <span
        v-bind:class="{
                        'text-red-500' : transaction.direction == 'outflow',
                        'text-green-500' : transaction.direction == 'inflow',
                        'text-gray-500' : transaction.direction == 'transfer'
                    }"
        v-if="transaction.imported"
        v-text="transaction.direction"
      >

      </span>
      <select
        v-if="!transaction.imported"
        id="type"
        v-model="transaction.direction"
        v-on:change="invertAmount( key )"
        class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
      >
        <option value=""></option>
        <option value="inflow">Inflow</option>
        <option value="outflow">Outflow</option>
        <option value="transfer">Transfer</option>
      </select>
    </td>
    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap w-52">
      <category-select
        v-model="transaction.category"
        v-if="!transaction.imported"
      />
      <span v-if="transaction.imported">
        <span
          v-if="transaction.category.parent_name != ''"
          class="text-gray-400"
          v-text="transaction.category.parent_name + ' > '"
        ></span> {{ transaction.category.name }}
      </span>
    </td>
    <td class="px-3 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
      <input
        v-if="!transaction.imported"
        @keypress.enter="saveTransaction()"
        class="flex-1 block w-full min-w-0 px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
        v-model="transaction.name"
      />
      <span
        v-if="transaction.imported"
        v-text="transaction.name"
      />
    </td>
    <td class="px-3 py-4 text-sm font-bold text-gray-500 whitespace-nowrap">
      <span v-bind:class="{
                        'text-red-500' : transaction.direction == 'outflow',
                        'text-green-500' : transaction.direction == 'inflow',
                        'text-gray-500' : transaction.direction == 'transfer'
                    }">
        {{ transaction.amount }}
      </span>
    </td>
    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
      {{ transaction.date }}
    </td>
    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
      <button
        v-if="!transaction.imported"
        type="button"
        @click="deleteTransaction()"
        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
      >
        Delete
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="ml-2 -mr-0.5 h-4 w-4"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </button>
    </td>
  </tr>
</template>

<script>
import { EventBus } from "@/event-bus.js";
import { mapState } from "vuex";
import CategorySelect from "@/Components/Categories/CategorySelect.vue";
import TransactionsAPI from "@/api/transactions.js";

export default {
  props: ["index", "transaction", "syncBalances"],

  components: {
    CategorySelect,
  },

  computed: {
    ...mapState("transactions/importProcess", {
      account: (state) => state.account,
    }),
  },

  methods: {
    deleteTransaction() {
      EventBus.emit("remove-transaction", this.index);
    },

    saveTransaction() {
      TransactionsAPI.store({
        account: this.account,
        date: this.transaction.date,
        amount: Math.abs(this.transaction.amount),
        direction: this.transaction.direction,
        name: this.transaction.name,
        tags: [],
        category: this.transaction.category,
        update_balance: this.syncBalances,
      }).then(
        function (response) {
          EventBus.emit("transaction-persisted", this.index);
        }.bind(this)
      );
    },

    invertAmount(key) {
      if (this.transaction.direction == "outflow") {
        this.transaction.amount = parseFloat(
          Math.abs(this.transaction.amount) * -1
        ).toFixed(2);
      } else {
        this.transaction.amount = parseFloat(
          Math.abs(this.transaction.amount)
        ).toFixed(2);
      }
    },

    viewDuplicate(transaction, key) {
      EventBus.emit("view-potential-duplicate", {
        transaction: transaction,
        key: key,
      });
    },
  },
};
</script>