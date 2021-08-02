<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ToDo管理
      </h2>
    </template>
    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <inertia-link :href="route('task.create')">
          <jet-button
            class="bg-blue-700 text-base my-8"
            >新規作成</jet-button
          >
        </inertia-link>

        <table class="shadow-md">
          <thead>
            <tr class="bg-gray-700 text-white font-bold">
              <th class="border border-black px-8 py-2">タスク</th>
              <th class="border border-black px-8 py-2">進捗</th>
              <!-- <th class="border border-blue-500 px-4 py-2">詳細</th> -->
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-white hover:bg-gray-300 cursor-pointer"
              v-for="task in tasks"
              :key="task.id"
            >
              <td class="border border-black px-8 py-2">{{ task.title }}</td>
              <td class="border border-black px-8 py-2">
                {{ progress[task.status] }}
              </td>
              <!-- <td class="border border-blue-500 px-4 py-2">{{ task.description }}</td> -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import JetButton from "@/Jetstream/Button";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetLabel from "@/Jetstream/Label";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";

export default {
  props: ["tasks"],
  data() {
    return {
      progress: ["未着手", "進行中", "完了", "保留"],
    };
  },
  methods: {},

  components: {
    AppLayout,
    Welcome,
    JetButton,
    JetSecondaryButton,
    JetLabel,
    JetInput,
    JetInputError,
  },
};
</script>
