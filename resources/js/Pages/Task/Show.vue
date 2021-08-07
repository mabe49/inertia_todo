<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ToDo管理
      </h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="md:grid md:grid-cols-5 md:gap-6">
        <jet-section-title>
          <template #title>ToDo詳細</template>
          <template #description>No.{{ this.task.id }}</template>
        </jet-section-title>

        <div class="mt-5 md:mt-0 md:col-span-4">
          <table class="shadow-md">
            <thead>
              <tr class="bg-gray-300 font-bold">
                <th class="border border-black px-8 py-2">タスク</th>
                <th class="border border-black px-8 py-2">進捗</th>
                <th class="border border-black px-4 py-2">詳細</th>
                <th class="border border-black px-4 py-2">更新</th>
              </tr>
            </thead>
            <tbody>
              <tr class="bg-white cursor-pointer">
                <td class="border border-black px-8 py-2">
                  {{ task.title }}
                </td>
                <td class="border border-black px-8 py-2">
                  {{ progress[this.task.status] }}
                </td>
                <td class="border border-black px-8 py-2">
                  {{ this.task.description }}
                </td>
                <td class="border px-4 py-2 text-center border-black">
                <inertia-link :href="route('task.edit', task.id)">
                  <jet-button class="bg-green-500 text-base">更新</jet-button>
                </inertia-link>
              </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetSectionTitle from "@/Jetstream/SectionTitle";
import JetButton from "@/Jetstream/Button";

export default {
  props: {
    errors: {
      type: Object,
    },
    task: {
      type: Object,
      title: String,
      status: Number,
      description: String,
    },
  },

  components: {
    AppLayout,
    JetSectionTitle,
    JetButton,
  },
  data() {
    return {
      progress: ["未着手", "進行中", "完了", "保留"],
    };
  },
  methods: {},
};
</script>
