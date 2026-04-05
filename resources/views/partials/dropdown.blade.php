    <div class="d-flex justify-content-end mb-3">

        <div class="dropdown">
            <button class="btn btn-outline-dark d-flex align-items-center gap-2 px-3 py-2 fw-bold" type="button"
                data-bs-toggle="dropdown" aria-expanded="false">

                <i class="bi bi-person-circle"></i>
                <span>Hi {{ auth()->user()->name ?? 'User' }}</span>
                <i class="bi bi-chevron-down small"></i>
            </button>

            <ul class="dropdown-menu dropdown-menu-end  border-2">
                <li>
                    <a class="dropdown-item fw-bold" href="#">
                        <i class="bi bi-person me-2"></i> Profile
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item fw-bold">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
