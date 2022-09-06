<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Head title="Roadmap" />

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
            </template>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-4 text-gray-600 dark:text-orange-400 text-xl">
                <header>
                    <h1>Stunning Bassoon Roadmap</h1>
                </header>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold underline text-gray-900 dark:text-white">Project Roadmap</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <ol class="list-decimal">
                                    <li>Create initial project policies
                                        <ol class="ml-6 list-decimal">
                                            <li>Privacy policy</li>
                                            <li>Issues policy</li>
                                            <li>T&Cs</li>
                                            <li>Contribution guide</li>
                                            <li>Testing guide</li>
                                        </ol>
                                    </li>
                                    <li>Create different envoronments
                                        <ul class="ml-6 list-disc">
                                            <li>Development</li>
                                            <li>Staging</li>
                                            <li>Production</li>
                                        </ul>
                                    </li>
                                    <li>Create GitHub workflows</li>
                                    <li>Access Folder structure</li>
                                    <li>Display folder structure in UI</li>
                                    <li>Manually upload a file</li>
                                    <li>Create a plugin system
                                        <ul class="ml-6 list-disc">
                                            <li>Monitor directory for changes and upload files</li>
                                            <li>Preview files in UI (directory view)</li>
                                            <li>OCR
                                                <ol class="ml-6 list-decimal">
                                                    <li>Add recognised text to database</li>
                                                </ol>
                                            </li>
                                            <li>MFA</li>
                                            <li>File encyption</li>
                                            <li>Add email accounts
                                                <ol class="ml-6 list-decimal">
                                                    <li>Monitor accounts</li>
                                                    <li>Flag contacts for monitoring</li>
                                                    <li>Flag search terms for monitoring</li>
                                                    <li>Auto import flagged contcts</li>
                                                </ol>
                                            </li>
                                            <li>Office integration plugin</li>
                                            <li>File versioning</li>
                                            <li>Additional storage systems</li>
                                            <li>Reports</li>
                                            <li>Tasker support</li>
                                            <li>Tagging</li>
                                            <li>Audio file Support
                                                <ol class="ml-6 list-decimal">
                                                    <li>Speech recognition for transcripts</li>
                                                </ol>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>Package system</li>
                                </ol>

                                <p>As you can see, I rely heaverly on plugins. For this I took inspiration from NextCloud. NextCloud has much of its functionality in plugins via a modular system.</p>
                                <p>That is  </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-left sm:ml-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    </div>
</template>
