<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Create Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="name" name="name" id="name" class="form-control" value="name"
                            placeholder="Enter Student Name">
                        <small class="text-danger form-error fade" data-error="name"></small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value=""
                            placeholder="Enter Student Email">
                        <small class="text-danger form-error fade" data-error="email"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Choose Major</label>
                        <select class="form-select majors-select" name="major_id" id="major_id"></select>
                        <small class="text-danger form-error fade" data-error="major_id"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date Of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value=""
                            placeholder="Enter Student Birth Date">
                        <small class="text-danger form-error fade" data-error="date_of_birth"></small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="address" name="address" id="address" value="" class="form-control"
                            placeholder="Enter Student Address">
                        <small class="text-danger form-error fade" data-error="address"></small>
                    </div>
                    <button class="btn btn-primary float-end" id="formModalButton">Add Student</button>
                </form>
            </div>
        </div>
    </div>
</div>
