<header class="bg-white shadow sticky top-0 z-30">
    <div class="flex justify-between items-center py-4 px-6 md:px-8">
        <!-- Judul Dashboard -->
        <h1 class="text-xl md:text-2xl font-semibold flex items-center gap-2">
            <i class="material-icons text-blue-600">dashboard</i>
            <span class="hidden sm:inline">Dashboard</span>
        </h1>

        <!-- Dropdown Profil -->
        <div class="relative group">
            <button
                class="flex items-center gap-2 bg-gray-100 rounded-full px-3 py-1 hover:bg-gray-200 transition-colors">
                <i class="fas fa-user-circle text-xl md:text-2xl text-blue-600"></i>
                <span class="text-sm md:text-base">Admin OPD</span>
            </button>

            <!-- Menu dropdown -->
            <div
                class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity duration-200 z-50">
                <ul class="py-2 text-gray-700 text-sm">
                    <li>
                        <a href="{{ route('opd.profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">
                            Profil Saya
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
