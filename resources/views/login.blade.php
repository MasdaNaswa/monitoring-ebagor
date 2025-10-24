<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Bagor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body
    class="bg-gradient-to-br from-gray-100 to-blue-200 flex justify-center items-center min-h-screen font-sans text-gray-800">

    <div class="login-container relative bg-white p-10 rounded-xl shadow-lg w-[500px] overflow-hidden">

        <!-- Top gradient bar -->
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-green-400"></div>

        <!-- Logo -->
        <div class="logo text-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo"
                class="h-32 mx-auto transition-transform duration-300 hover:scale-105">
        </div>

        <h2 class="text-center text-2xl font-semibold mb-8">LOGIN MONITORING BAGOR</h2>

        <form id="loginForm">


            <!-- Email input -->
            <div class="mb-6 relative">
                <label for="email" class="block mb-2 font-medium text-gray-700">Email</label>
                <i class="fas fa-user absolute top-11 left-3 text-gray-400"></i>
                <input type="text" id="email" placeholder="Masukkan email" required
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 bg-gray-100 focus:bg-white focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none transition" />
            </div>

            <!-- Password input -->
            <div class="mb-6 relative">
                <label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
                <i class="fas fa-lock absolute top-11 left-3 text-gray-400"></i>
                <input type="password" id="password" placeholder="Masukkan password" required
                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 bg-gray-100 focus:bg-white focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none transition" />
                <div class="text-right mt-1">
                    <a href="#" class="text-gray-400 text-sm hover:text-blue-500">Lupa password?</a>
                </div>
            </div>
            <!-- Role select -->
            <div class="mb-6">
                <label for="role" class="block mb-2 font-medium text-gray-700">Login Sebagai</label>
                <select id="role" required
                    class="w-full py-3 px-4 rounded-lg border border-gray-200 bg-gray-100 focus:bg-white focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none appearance-none pr-10 relative">
                    <option value="">-- Pilih Role --</option>
                    <option value="bagor">Bagian Organisasi (Bagor)</option>
                    <option value="opd">OPD</option>
                </select>
            </div>

            <!-- Bagor Role select -->
            <div class="mb-6 hidden" id="bagor-role-list">
                <label for="bagor-role" class="block mb-2 font-medium text-gray-700">Pilih Bagor Role</label>
                <select id="bagor-role"
                    class="w-full py-3 px-4 rounded-lg border border-gray-200 bg-gray-100 focus:bg-white focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none appearance-none pr-10 relative">
                    <option value="">-- Pilih Bagor Role --</option>
                    <option value="adminrb">Admin RB</option>
                    <option value="admin_pelayanan">Admin Pelayanan Publik</option>
                    <option value="admin_kelembagaan">Admin Kelembagaan</option>
                </select>
            </div>

            <!-- OPD select -->
            <div class="mb-6 hidden" id="opd-list">
                <label for="opd" class="block mb-2 font-medium text-gray-700">Pilih OPD</label>
                <select id="opd"
                    class="w-full py-3 px-4 rounded-lg border border-gray-200 bg-gray-100 focus:bg-white focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none appearance-none pr-10 relative">
                    <option value="">-- Pilih OPD Anda --</option>
                    <option value="diskominfo">Diskominfo</option>
                    <option value="baperlitbang">Baperlitbang</option>
                    <option value="bpkad">BPKAD</option>
                    <option value="inspektorat">Inspektorat Daerah</option>
                    <option value="bkpsdm">BKPSDM</option>
                    <option value="ptsp">PTSP</option>
                    <option value="dinas_pupr">Dinas PUPR</option>
                    <option value="dinas_pendidikan_dan_kebudayaan">Dinas Pendidikan dan Kebudayaan</option>
                    <option value="dinas_perhubungan">Dinas Perhubungan</option>
                    <option value="dinas_perumahan_dan_permukiman">Dinas Perumahan dan Permukiman</option>
                    <option value="dinas_kesehatan">Dinas Kesehatan</option>
                    <option value="dinas_koperasi">Dinas Koperasi, Usaha Mikro, Perdagangan, dan ESDM</option>
                    <option value="dinas_pertanian">Dinas Pertanian</option>
                    <option value="dinas_sosial">Dinas Sosial</option>
                    <option value="dinas_perikanan">Dinas Perikanan</option>
                    <option value="dinas_kerprind">Dinas Tenaga Kerja dan Perindustrian</option>
                    <option value="dinas_pengendalian_penduduk">Dinas Pengendalian Penduduk, KB, PP, dan PA</option>
                    <option value="dpmptsp">DPMPTSP</option>
                    <option value="bakesbangpol">Bakesbangpol</option>
                    <option value="satpolpp">Satpol PP</option>
                    <option value="ukpbj">UKPBJ</option>
                    <option value="bagian_perekonomian_setda">Bagian Perekonomian Setda</option>
                    <option value="dinas_pangan">Dinas Pangan</option>
                    <option value="bagor">Bagian Organisasi Sekda</option>
                    <option value="bagian_hukum_sekda">Bagian Hukum Sekretariat Daerah</option>
                    <option value="bagian_pbj_setda">Bagian PBJ Setda</option>
                    <option value="unit_pelayan_publik">Unit Pelayan Publik</option>
                    <option value="dinas_lingkungan_hidup">Dinas Lingkungan Hidup</option>
                    <option value="rsud">RSUD M.SANI</option>
                </select>
            </div>

            <button type="submit"
                class="btn-login w-full py-3 rounded-lg bg-blue-500 text-white font-medium hover:bg-blue-600 transition flex items-center justify-center gap-2">
                <i class="fas fa-sign-in-alt"></i> MASUK
            </button>
        </form>
    </div>

    <script>
        const roleSelect = document.getElementById('role');
        const opdList = document.getElementById('opd-list');
        const bagorRoleList = document.getElementById('bagor-role-list');

        roleSelect.addEventListener('change', function () {
            opdList.classList.toggle('hidden', this.value !== 'opd');
            bagorRoleList.classList.toggle('hidden', this.value !== 'bagor');
        });

        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const role = roleSelect.value;

            let targetUrl = '';

            if (role === 'opd') {
                const opd = document.getElementById('opd').value;
                if (!opd) {
                    alert('Silakan pilih OPD terlebih dahulu!');
                    return;
                }
                targetUrl = '{{ url("opd-dashboard") }}?opd=' + opd;
            } else if (role === 'bagor') {
                const bagorRole = document.getElementById('bagor-role').value;
                if (!bagorRole) {
                    alert('Silakan pilih Bagor Role terlebih dahulu!');
                    return;
                }
                if (bagorRole === 'adminrb') targetUrl = '{{ url("adminrb-dashboard") }}';
                else if (bagorRole === 'admin_pelayanan') targetUrl = '{{ url("admin-pelayanan-dashboard") }}';
                else if (bagorRole === 'admin_kelembagaan') targetUrl = '{{ url("admin-kelembagaan-dashboard") }}';
            }

            const btn = this.querySelector('button');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            btn.disabled = true;

            setTimeout(() => {
                window.location.href = targetUrl;
            }, 1500);
        });
    </script>
</body>

</html>