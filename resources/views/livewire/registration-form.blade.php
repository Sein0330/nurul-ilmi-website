<div class="bg-white rounded-3xl p-6 sm:p-10 lg:p-12 border border-gray-100 shadow-sm">
    <!-- Success Alert -->
    @if (session()->has('success'))
        <div x-data="{ show: true }"
             x-show="show"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="mb-8 p-4 sm:p-5 rounded-xl bg-emerald-50 border-l-4 border-emerald-500 shadow-xs flex items-start justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-emerald-900">Sukses!</h4>
                    <p class="text-xs sm:text-sm text-emerald-700 mt-0.5">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
            <button @click="show = false" type="button" class="text-emerald-500 hover:text-emerald-700 text-lg leading-none">&times;</button>
        </div>
    @endif

    @auth
        <form wire:submit.prevent="submit" class="space-y-6">
            <!-- Subheading / Section Badge -->
            <div class="flex items-center gap-2 mb-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#b08d6a]"></span>
                <span class="text-xs font-bold uppercase tracking-wider text-[#b08d6a]">Data Diri Calon Siswa</span>
            </div>

            <!-- Grid 2 Kolom: Data Pribadi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
                <!-- Nama Lengkap -->
                <div>
                    <label for="nama_lengkap" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">
                        Nama Lengkap <span class="text-rose-500">*</span>
                    </label>
                    <input type="text"
                           id="nama_lengkap"
                           wire:model="nama_lengkap"
                           placeholder="Contoh: Muhammad Farhan"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-700 placeholder-gray-400 bg-gray-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:border-transparent transition-all duration-200" />
                    @error('nama_lengkap')
                        <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Jenis Kelamin -->
                <div>
                    <label for="jenis_kelamin" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">
                        Jenis Kelamin <span class="text-rose-500">*</span>
                    </label>
                    <select id="jenis_kelamin"
                            wire:model="jenis_kelamin"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-700 bg-gray-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:border-transparent transition-all duration-200">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Pendidikan Saat Ini -->
                <div>
                    <label for="pendidikan_saat_ini" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">
                        Pendidikan / Jenjang Saat Ini <span class="text-rose-500">*</span>
                    </label>
                    <select id="pendidikan_saat_ini"
                            wire:model="pendidikan_saat_ini"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-700 bg-gray-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:border-transparent transition-all duration-200">
                        <option value="">-- Pilih Jenjang Pendidikan --</option>
                        <option value="SD / MI sederajat">SD / MI sederajat</option>
                        <option value="SMP / MTs sederajat">SMP / MTs sederajat</option>
                        <option value="SMA / SMK / MA sederajat">SMA / SMK / MA sederajat</option>
                        <option value="Mahasiswa / Gap Year">Mahasiswa / Gap Year</option>
                        <option value="Umum / Profesional">Umum / Profesional</option>
                    </select>
                    @error('pendidikan_saat_ini')
                        <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Nomor WhatsApp / Telepon -->
                <div>
                    <label for="no_telp" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">
                        Nomor WhatsApp / Telepon Aktif <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-xs font-semibold text-gray-400">
                            +62
                        </span>
                        <input type="text"
                               id="no_telp"
                               wire:model="no_telp"
                               placeholder="81234567890"
                               class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-700 placeholder-gray-400 bg-gray-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:border-transparent transition-all duration-200" />
                    </div>
                    @error('no_telp')
                        <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Alamat Lengkap (Full Width) -->
            <div>
                <label for="alamat_lengkap" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">
                    Alamat Domisili Lengkap <span class="text-rose-500">*</span>
                </label>
                <textarea id="alamat_lengkap"
                          wire:model="alamat_lengkap"
                          rows="2"
                          placeholder="Tuliskan nama jalan, kelurahan, kecamatan, dan kota domisili..."
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-700 placeholder-gray-400 bg-gray-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:border-transparent transition-all duration-200"></textarea>
                @error('alamat_lengkap')
                    <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Section 2: Pemilihan Kelas & Paket -->
            <div class="pt-4 border-t border-gray-100">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#b08d6a]"></span>
                    <span class="text-xs font-bold uppercase tracking-wider text-[#b08d6a]">Pilihan Program & Pembelajaran</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-6">
                    <!-- Program Pembelajaran -->
                    <div>
                        <label for="program_pembelajaran" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">
                            Program Belajar <span class="text-rose-500">*</span>
                        </label>
                        <select id="program_pembelajaran"
                                wire:model="program_pembelajaran"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-700 bg-gray-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:border-transparent transition-all duration-200">
                            <option value="">-- Pilih Program Pembelajaran --</option>
                            @foreach($programs as $program)
                                <option value="{{ $program }}">{{ $program }}</option>
                            @endforeach
                        </select>
                        @error('program_pembelajaran')
                            <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Pilihan Format Kelas -->
                    <div>
                        <label for="pilihan_kelas" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">
                            Format Kelas <span class="text-rose-500">*</span>
                        </label>
                        <select id="pilihan_kelas"
                                wire:model="pilihan_kelas"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-700 bg-gray-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:border-transparent transition-all duration-200">
                            <option value="">-- Pilih Format Kelas --</option>
                            @foreach($classFormats as $format)
                                <option value="{{ $format }}">{{ $format }}</option>
                            @endforeach
                        </select>
                        @error('pilihan_kelas')
                            <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Pilihan Paket Durasi & Harga -->
                    <div>
                        <label for="pilihan_paket" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">
                            Pilihan Paket & Harga <span class="text-rose-500">*</span>
                        </label>
                        <select id="pilihan_paket"
                                wire:model="pilihan_paket"
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-700 bg-gray-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:border-transparent transition-all duration-200">
                            <option value="">-- Pilih Paket & Harga --</option>
                            @foreach($packages as $package)
                                <option value="{{ $package }}">{{ $package }}</option>
                            @endforeach
                        </select>
                        @error('pilihan_paket')
                            <p class="text-xs text-rose-500 mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 3: Informasi Tambahan (Nullable) -->
            <div class="pt-4 border-t border-gray-100">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-2.5 h-2.5 rounded-full bg-gray-300"></span>
                    <span class="text-xs font-bold uppercase tracking-wider text-gray-500">Informasi Tambahan (Opsional)</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-6">
                    <!-- Pengalaman Sebelumnya -->
                    <div>
                        <label for="pengalaman_sebelumnya" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">
                            Pengalaman Belajar Sebelumnya
                        </label>
                        <textarea id="pengalaman_sebelumnya"
                                  wire:model="pengalaman_sebelumnya"
                                  rows="2"
                                  placeholder="Pernah ikut les/kursus sebelumnya atau otodidak?"
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-700 placeholder-gray-400 bg-gray-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:border-transparent transition-all duration-200"></textarea>
                    </div>

                    <!-- Kemampuan Saat Ini -->
                    <div>
                        <label for="kemampuan_saat_ini" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">
                            Kemampuan / Level Saat Ini
                        </label>
                        <textarea id="kemampuan_saat_ini"
                                  wire:model="kemampuan_saat_ini"
                                  rows="2"
                                  placeholder="Pemula mutlak, menengah, atau sudah paham dasar?"
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-700 placeholder-gray-400 bg-gray-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:border-transparent transition-all duration-200"></textarea>
                    </div>

                    <!-- Catatan Khusus -->
                    <div>
                        <label for="catatan_khusus" class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">
                            Catatan / Permintaan Khusus
                        </label>
                        <textarea id="catatan_khusus"
                                  wire:model="catatan_khusus"
                                  rows="2"
                                  placeholder="Hari/jam yang diinginkan, target ujian, dsb..."
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-gray-700 placeholder-gray-400 bg-gray-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:border-transparent transition-all duration-200"></textarea>
                    </div>
                </div>
            </div>

            <!-- Submit Button with Loading State -->
            <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-xs text-gray-400 order-2 sm:order-1 text-center sm:text-left">
                    Data Anda aman dan hanya digunakan untuk keperluan koordinasi bimbingan belajar Nurul Ilmi.
                </p>

                <button type="submit"
                        wire:loading.attr="disabled"
                        class="order-1 sm:order-2 w-full sm:w-auto px-8 py-3.5 rounded-full text-sm font-semibold text-white bg-[#b08d6a] hover:bg-[#9c7a59] focus:outline-none focus:ring-2 focus:ring-[#b08d6a] focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow-md active:scale-95 disabled:opacity-60 disabled:cursor-not-allowed inline-flex items-center justify-center gap-2">
                    <!-- Normal state -->
                    <span wire:loading.remove wire:target="submit" class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Daftar Sekarang
                    </span>

                    <!-- Loading state -->
                    <span wire:loading wire:target="submit" class="flex items-center gap-2">
                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memproses...
                    </span>
                </button>
            </div>
        </form>
    @else
        <!-- Card Peringatan Belum Login -->
        <div class="p-8 sm:p-10 rounded-2xl bg-yellow-50 border border-yellow-200 text-center space-y-4">
            <div class="w-14 h-14 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center mx-auto shadow-xs">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <div class="max-w-md mx-auto">
                <h4 class="text-lg font-bold text-yellow-900">Pendaftaran Memerlukan Akun</h4>
                <p class="text-sm text-yellow-800 mt-1">
                    Anda harus masuk terlebih dahulu untuk mendaftar les.
                </p>
            </div>
            <div class="pt-2">
                <a href="{{ route('login') }}"
                   wire:navigate
                   wire:navigate.hover
                   class="inline-flex items-center justify-center px-7 py-3 rounded-full text-sm font-semibold text-white bg-[#b08d6a] hover:bg-[#9c7a59] transition-all duration-200 shadow-sm hover:shadow active:scale-95">
                    Login / Daftar Akun
                </a>
            </div>
        </div>
    @endauth
</div>
