<template>
    <div class="w-full flex flex-cols-1 md:flex-cols-2 min-h-screen">
        <aside class="w-[292px] bg-gray-100 px-2 py-6">
            <div class="flex justify-center items-center">
                <h1 class="text-4xl font-semibold text-gray-800">Logo</h1>
            </div>
        </aside>
        <div class="">
            <nav class="w-full flex justify-end items-center h-15 bg-gray-300">
                <div>
                    <img src="" alt="Profile picture" class="rounded-full w-8 h-8 focus:ring-1 focus:ring-gray-400">
                </div>
            </nav>
            <section class="p-20">
                <div class="bg-gray-50 rounded-lg shadow-md">
                    <table>
                        <tr>
                            <th></th>
                            <th>Module</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Url Shortener</td>
                            <td></td>
                            <td>4</td>
                            <td>5</td>
                        </tr>
                    </table>
                </div>
            </section>
        </div>
    </div>
</template>

<script setup>
import { useModuleStore } from '@/stores/ModulesStore';
import { onMounted } from 'vue';

const Module = useModuleStore()

onMounted()
</script>