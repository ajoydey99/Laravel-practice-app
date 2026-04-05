 @extends('layouts.app')

 @section('title', 'Home Page')

 @section('content')
     <div class="container">

         <div class="card shadow p-3">
             <!-- Top Controls -->

             <div class="d-flex flex-wrap gap-2 justify-content-between mb-3">
                 {{-- <a href="{{ route('customers.create') }}" class="btn btn-primary">
                     <i class="bi bi-plus-lg"></i> Create Customer
                 </a> --}}

                 <h4>Customers</h4>

                 <div class="d-flex gap-2 w-50">
                     @if (request('search'))
                         <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                             Reset
                         </a>
                     @endif
                     <!-- Search Form -->
                     <form action="{{ route('customers.index') }}" method="GET" class="flex-grow-1">
                         <div class="input-group">
                             <input type="text" name="search" class="form-control border-primary shadow-none"
                                 placeholder="Search by name or email" required value="{{ request()->search }}">
                             <button typ="submit" class="btn btn-primary">Search</button>
                         </div>
                     </form>

                     <!-- Sort Dropdown -->
                     <select class="form-select w-auto shadow-none border-primary">
                         <option>Newest to Old</option>
                         <option>Old to Newest</option>
                     </select>
                 </div>
             </div>

             <!-- Table -->
             <div class="table-responsive">
                 <table class="table table-bordered align-middle">
                     <thead class="table-light">
                         <tr>
                             <th>#</th>
                             <th>First Name</th>
                             <th>Last Name</th>
                             <th>Phone Number</th>
                             <th>Email</th>
                             <th>Account No.</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @forelse ($customers as $customer)
                             <tr>
                                 <td>{{ ($customers->currentPage() - 1) * $customers->perPage() + $loop->iteration }}</td>
                                 <td>{{ $customer->first_name }}</td>
                                 <td>{{ $customer->last_name }}</td>
                                 <td>{{ $customer->phone }}</td>
                                 <td>{{ $customer->email }}</td>
                                 <td>{{ $customer->account_no }}</td>
                                 <td class="action-icons">
                                     <a href="{{ route('customers.edit', $customer->id) }}"
                                         class="ms-2 me-2 text-decoration-none">
                                         <i class="bi bi-pencil-square text-primary" title="Edit"></i>
                                     </a>
                                     <a href="{{ route('customers.show', $customer->id) }}"
                                         class="me-2 text-decoration-none">
                                         <i class="bi bi-eye text-secondary" title="View"></i>
                                     </a>
                                     <form action="{{ route('customers.destroy', $customer->id) }}" method='POST'
                                         class='d-inline'>
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" class="text-decoration-none delete-btn">
                                             <i class="bi bi-trash text-danger" title="Delete"></i>
                                         </button>
                                     </form>
                                 </td>
                             </tr>
                         @empty
                             <tr>
                                 <td colspan="7" class="text-center text-muted">
                                     No customers found
                                 </td>
                             </tr>
                         @endforelse
                     </tbody>
                 </table>

                 {{-- Render pagination links --}}
                 {{ $customers->links() }}
             </div>
         </div>
     </div>
 @endsection
