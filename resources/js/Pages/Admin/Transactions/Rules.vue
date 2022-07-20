<template>
  <admin-layout>
    <div class="flex-1 max-h-screen xl:overflow-y-auto">
      <div class="max-w-5xl px-4 py-10 mx-auto sm:px-6 lg:py-12 lg:px-8">
        <h1 class="text-3xl font-extrabold text-gray-900">Transactions</h1>

        <p class="mb-5 font-sans text-gray-700">Manage settings related to how transactions categorized, tagged and customized.</p>

        <sub-navigation :active="'rules'" />

        <rules-table />

      </div>
    </div>
  </admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout";
import RulesTable from "@/Components/Admin/Transactions/RulesTable";
import SubNavigation from "@/Components/Admin/Transactions/SubNavigation";

export default {
  components: {
    AdminLayout,
    RulesTable,
    SubNavigation,
  },
};
</script>