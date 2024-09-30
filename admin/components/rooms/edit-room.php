<div class="main">
    <div class="header">
        <div class="text">
            <h2>Edit Room</h2>
        </div>
    </div>
    <hr>
    <br>
    <br>
    <div class="form">
        <form id="updateRoomForm" action="" enctype="multipart/form-data">
            <input type="number" name="id" id="id" hidden>
            <input type="text" name="apartment" id="apartment" hidden>
            <div class="row">
                <div class="col">
                    <label for="">Room No</label>
                    <input readonly type="number" id="room_no" name="room_no">
                </div>
                <div class="col">
                    <label for="">Details</label>
                    <input type="text" name="details" id="details">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Type of Room</label>
                    <select name="type" id="type">
                        <option value=""></option>
                        <option value="Bed Spacer">Bed Spacer</option>
                        <option value="Studio">Studio</option>
                    </select>
                </div>
                <div class="col">
                    <label for="">Bedrooms</label>
                    <input type="number" id="bedrooms" name="bedrooms">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Price</label>
                    <input type="number" id="price" name="price">
                </div>
                <div class="col">
                    <label for="">Upload Image</label>
                    <input type="file" name="image[]" id="image" multiple>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn-success" >Update</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn-danger" id="cancelBtn">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="./js/admin/edit-room.js"></script>