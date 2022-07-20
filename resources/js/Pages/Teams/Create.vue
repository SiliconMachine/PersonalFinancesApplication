<template>
  <app-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Create Team
      </h2>
    </template>

    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <create-team-form />
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import CreateTeamForm from "./CreateTeamForm";
import JetSectionBorder from "./../../Jetstream/SectionBorder";

export default {
  props: ["team"],

  components: {
    AppLayout,
    CreateTeamForm,
    JetSectionBorder,
  },
};
</script>
