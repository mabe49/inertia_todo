<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ToDo管理
      </h2>
    </template>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <jet-form-section @submitted="taskEdit">
        <template #title>ToDo更新</template>
        <template #description>ToDoの更新を行います</template>
        <template #form>
          <div class="col-span-6 sm:col-span-4">
            <jet-label for="title" value="タイトル" />
            <jet-input
              id="title"
              type="text"
              class="mt-1 block w-full"
              v-model="form.title"
            />
            <jet-input-error :message="errors.title" class="mt-2" />
          </div>
          <div class="col-span-6 sm:col-span-4">
            <jet-label for="status" value="進行状況" />
            <div class="flex flex-row">
              <jet-radio
                name="status"
                v-model:checked="form.status"
                value="0"
              />
              <jet-label for="status" value="未着手" class="mr-4 ml-2" />
              <jet-radio
                name="status"
                v-model:checked="form.status"
                value="1"
              />
              <jet-label for="status" value="進行中" class="mr-4 ml-2" />
              <jet-radio
                name="status"
                v-model:checked="form.status"
                value="2"
              />
              <jet-label for="status" value="完了" class="mr-4 ml-2" />
              <jet-radio
                name="status"
                v-model:checked="form.status"
                value="3"
              />
              <jet-label for="status" value="保留" class="mr-4 ml-2" />
            </div>
            <jet-input-error :message="errors.status" class="mt-2" />
          </div>

          <div class="col-span-6 sm:col-span-4">
            <jet-label for="description" value="詳細" />
            <jet-input
              id="description"
              type="text"
              class="mt-1 block w-full"
              v-model="form.description"
            />
            <jet-input-error :message="errors.description" class="mt-2" />
          </div>
        </template>
        <template #actions>
          <jet-button class="bg-blue-700">更新</jet-button>
        </template>
      </jet-form-section>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetRadio from "@/Jetstream/Radio";
import JetButton from "@/Jetstream/Button";
import JetInputError from "@/Jetstream/InputError";

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
    JetFormSection,
    JetInput,
    JetLabel,
    JetRadio,
    JetButton,
    JetInputError,
  },
  data() {
    return {

      form: this.$inertia.form(
        {
          title: this.task.title,
          status: Number(this.task.status),
          description: this.task.description,
        },
        {
          resetOnSuccess: false,
        }
      ),
    };
  },
  methods: {
    taskEdit() {
      console.log(this.task.id);
      this.form.put(route("task.update", this.task.id));
    },
  },
};
</script>
