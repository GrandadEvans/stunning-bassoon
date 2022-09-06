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
    <Head title="Welcome" />

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
                    <h1>Stunning Bassoon</h1>
                </header>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold underline text-gray-900 dark:text-white">Features</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <ul>
                                    <li>Email Support</li>
                                    <li><abbr title="Optical Character Recognition">OCR</abbr></li>
                                    <li>Secure</li>
                                    <li>Office Software Integration</li>
                                    <li>File Versioning</li>
                                    <li>Tagging</li>
                                    <li>Audio File Support</li>
                                    <li>Extendable Functionality</li>
                                </ul>
                                <p class="mt-3">
                                    Why not 
                                    <Link :href="route('Roadmap')">view the Roadmap</Link>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold underline text-gray-900 dark:text-white">Why Stunning Bassoon?</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                While there could be no end to the reasons I could make up, the answer is so simple it's almost stupid.
                            </div>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                When I went to register the project in GitHub, I had absolutely no idea what I was going to call it. All I knew was the functionality that I wanted in the project.
                            </div>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Luckily, GitHub stepped with the solution.
                                It sais that the best project have a short and snappy memorable name.
                                'How about stunning-bassoon' it said. "Well", I thought&hellip; "why not?"
                            </div>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                There you have it - no hidden meaning, no personal symbolism, it was GitHub that suggested it, knowing absolutely nothing about the project.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold underline text-gray-900 dark:text-white">Built With</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Those who are familiar with Laravel, may recognise this welcome screen. That's just because I'm initially doing as little editing as possible, to begin with.
                            </div>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <ul>
                                    <li>Laravel</li>
                                    <li>Vue</li>
                                    <li>Vite</li>
                                    <li>Docker</li>
                                    <li>MySQL</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Get Involved</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                There are several simple things you can do if you want to get involved in this project.
                            </div>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">

                                <ol>
                                    <li><strong>Sponsor</strong><br />
                                        As a disabled person, who has to spend 20+ hours a day laid on a bed, I can honestly say that my family & I live below the bread line. I was a professional software engineer beforeI got so ill that I had to give up work. My Wife has to give up a 20+ year career as a teacher to help look after me and our son with special needs.
                                    </li>
                                    <li class="mt-3"><strong>Join the project</strong><br />
                                        If you want, please feel free to join in the coding experience. Any expertise is welcome, and I'll create a more in-depth giude as to how I see the project progressing, when I have time.
                                    </li>
                                </ol>
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
