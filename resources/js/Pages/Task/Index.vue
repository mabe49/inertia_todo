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
          <jet-button class="bg-blue-700 text-base my-8">新規作成</jet-button>
        </inertia-link>

        <table class="shadow-md">
          <thead>
            <tr class="bg-gray-500 font-bold">
              <th class="border border-black px-8 py-2">タスク</th>
              <th class="border border-black px-8 py-2">進捗</th>
              <th class="border border-black px-4 py-2">詳細</th>
              <th class="border border-black px-4 py-2">更新</th>
              <th class="border border-black px-8 py-2">削除</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-white cursor-pointer"
              v-for="task in tasks"
              :key="task.id"
            >
              <td class="border border-black px-8 py-2">
                {{ task.title }}
              </td>
              <td class="border border-black px-8 py-2">
                {{ progress[task.status] }}
              </td>
              <td class="border border-black px-4 py-2">
                {{ task.description }}
              </td>
              <td class="border px-4 py-2 text-center border-black">
                <inertia-link :href="route('task.edit', task.id)">
                  <jet-button class="bg-green-500 text-base">更新</jet-button>
                </inertia-link>
              </td>
              <td class="border px-4 py-2 text-center border-black">
                <jet-button
                  class="bg-red-500 text-base"
                  @click.native="deleteTask(task.id)"
                  >削除</jet-button
                >
              </td>
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
      form: this.$inertia.form({
        _method: "DELETE",
      }),
    };
  },
  methods: {
    deleteTask(id) {
      this.form.post(route("task.destroy", id), {
        preserveScroll: true,
      });
    },
  },

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
