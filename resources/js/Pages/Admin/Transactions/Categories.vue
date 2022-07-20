<template>
  <admin-layout>
    <div class="flex-1 max-h-screen xl:overflow-y-auto">
      <div class="max-w-5xl px-4 py-10 mx-auto sm:px-6 lg:py-12 lg:px-8">
        <h1 class="text-3xl font-extrabold text-gray-900">Transactions</h1>

        <p class="mb-5 font-sans text-gray-700">Manage settings related to how transactions categorized, tagged and customized.</p>

        <sub-navigation :active="'categories'" />

        <categories-table :categories="categories" />
      </div>
    </div>
  </admin-layout>
</template>

<script>
import AdminLayout from "./../../../Layouts/AdminLayout";
import CategoriesTable from "../../../Components/Admin/Transactions/CategoriesTable";
import SubNavigation from "../../../Components/Admin/Transactions/SubNavigation";

export default {
  props: ["categories"],

  components: {
    AdminLayout,
    CategoriesTable,
    SubNavigation,
  },
};
</script>