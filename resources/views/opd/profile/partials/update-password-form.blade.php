<div class="card-body p-6">
    <form action="#" method="POST" class="form grid gap-5">
        <!-- Password Saat Ini -->
        <div class="form-group mb-4">
            <label for="current_password" class="font-medium text-slate-800 mb-2 block text-sm">Kata Sandi Saat Ini</label>
            <div class="relative">
                <input type="password" id="current_password" name="current_password"
                    placeholder="Masukkan kata sandi saat ini"
                    class="w-full py-3 px-4 pr-10 border border-gray-300 rounded-lg text-sm transition-all duration-300 bg-gray-50 focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/15 focus:bg-white">
                <button type="button"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 focus:outline-none"
                    onclick="togglePassword('current_password', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <!-- Password Baru -->
        <div class="form-group mb-4">
            <label for="new_password" class="font-medium text-slate-800 mb-2 block text-sm">Kata Sandi Baru</label>
            <div class="relative">
                <input type="password" id="new_password" name="new_password"
                    placeholder="Masukkan kata sandi baru"
                    class="w-full py-3 px-4 pr-10 border border-gray-300 rounded-lg text-sm transition-all duration-300 bg-gray-50 focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/15 focus:bg-white">
                <button type="button"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 focus:outline-none"
                    onclick="togglePassword('new_password', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <!-- Konfirmasi Password Baru -->
        <div class="form-group mb-4">
            <label for="confirm_new_password" class="font-medium text-slate-800 mb-2 block text-sm">Konfirmasi Kata Sandi Baru</label>
            <div class="relative">
                <input type="password" id="confirm_new_password" name="confirm_new_password"
                    placeholder="Konfirmasi kata sandi baru"
                    class="w-full py-3 px-4 pr-10 border border-gray-300 rounded-lg text-sm transition-all duration-300 bg-gray-50 focus:outline-none focus:border-primary focus:ring-3 focus:ring-primary/15 focus:bg-white">
                <button type="button"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 focus:outline-none"
                    onclick="togglePassword('confirm_new_password', this)">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <button type="submit"
                class="btn btn-primary py-2 px-4 rounded-lg font-medium cursor-pointer inline-flex items-center justify-center gap-2 transition-all duration-300 bg-primary text-white border-none hover:bg-primary-dark hover:-translate-y-0.5 hover:shadow text-sm">
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
function togglePassword(fieldId, btn) {
    const input = document.getElementById(fieldId);
    const icon = btn.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
