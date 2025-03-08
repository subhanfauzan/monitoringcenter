        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">


                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
                    <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <li class="menu-item">
                    <a href="/dashboard" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-id"></i>
                        <div data-i18n="Dashboard">Dashboard</div>
                    </a>
                </li>

                <!-- Layouts -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                        <div data-i18n="Daftar Tiket">Daftar Tiket</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="/tiket" class="menu-link">
                                <div data-i18n="Import & Export">Import & Export</div>
                            </a>
                        </li>
                        @foreach ($nops as $nop)
                            <li class="menu-item">
                                <a href="{{ route('tiketissue.show', ['id' => $nop->id]) }}" class="menu-link">
                                    <div data-i18n="{{ $nop->nama_nop }}">{{ $nop->nama_nop }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="menu-item">
                    <a href="/nop" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="Daftar NOP">Daftar NOP</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="/dapot" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-checkbox"></i>
                        <div data-i18n="Daftar Dapot">Daftar Dapot</div>
                    </a>
                </li>

            </ul>
        </aside>
