<div class="main">
    <div class="header">
        <div class="text">
            <h2>Add New Tenants</h2>
        </div>
    </div>
    <hr>
    <br>
    <br>
    <div class="form">
        <form action="">
            <div class="row">
                <div class="col">
                    <label for="">Full Name</label>
                    <input type="text" id="name">
                </div>
                <div class="col">
                    <label for="">Contact Number</label>
                    <input type="text" maxlength="11" placeholder="EX: 09123456789" id="contact_number">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Apartment Assign</label>
                    <select name="" id="apartment_assign">
                        <option value=""></option>
                        <option value="Santiago Apartment">Santiago Apartment</option>
                        <option value="Quiñones and Aquino Boarding House">Quiñones and Aquino Boarding House</option>
                        <option value="Rodrigo Hirmino Dormitory">Rodrigo Hirmino Dormitory</option>
                        <option value="Jaiden Apartment Complex">Jaiden Apartment Complex</option>
                        <option value="Dysept Apartment">Dysept Apartment</option>
                        <option value="MK Apartment">MK Apartment</option>
                        <option value="JMCK Boarding House 10 rooms">JMCK Boarding House 10 rooms</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn-success" id="addTenantsBtn">Submit</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn-danger" id="backBtn">Back</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="./js/admin/tenants.js"></script>