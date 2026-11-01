<div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl p-8 md:p-12 flex flex-col md:flex-row items-center gap-8 mt-4">
    <div class="md:w-1/2 space-y-6">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
            Bimbel <span class="text-[#b08d6a]">Nurul Ilmi</span>
        </h1>
        <p class="text-lg text-gray-600 leading-relaxed">
            Penyedia jasa bimbingan belajar yang sedang berkembang, menghadirkan pembelajaran seimbang antara ilmu agama, pengetahuan umum, dan pembentukan akhlak untuk mencetak generasi yang berilmu, beriman, dan berakhlak mulia.
        </p>
        <div>
            <button wire:click="navigateTo('pendaftaran')" wire:transition class="bg-[#b08d6a] hover:bg-[#9c7a59] text-white font-bold py-3 px-8 rounded-xl transition shadow-lg">Daftar Les Sekarang</button>
        </div>
    </div>
    <div class="md:w-1/2">
        <img src="{{ asset('homepage.png') }}" alt="Nurul Ilmi" class="w-full h-auto rounded-2xl shadow-lg object-cover">
    </div>
</div>
