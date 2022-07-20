<template>
  <div class="overflow-hidden bg-white rounded-lg shadow">
    <div class="px-4 py-5 sm:p-6">
      <dt class="text-sm font-medium text-gray-500 truncate">
        Total Income
      </dt>
      <dd class="mt-1 text-3xl font-semibold text-gray-900">
        {{ formatMoney( totalIncome ) }}
      </dd>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
import { FormatMoney } from "../../../Mixins/formatMoney";

export default {
  data() {
    return {
      totalIncome: 0.0,
    };
  },

  mixins: [FormatMoney],

  computed: {
    ...mapState("transactions/table", {
      transactions: (state) => state.transactions,
    }),
  },

  watch: {
    transactions() {
      this.computeTotalIncome();
    },
  },

  methods: {
    computeTotalIncome() {
      this.totalIncome = 0.0;

      this.transactions.forEach(
        function (transaction) {
          if (transaction.direction == "inflow") {
            this.totalIncome += parseFloat(transaction.amount);
          }
        }.bind(this)
      );
    },
  },
};
</script>