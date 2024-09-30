<div class="main">
    <div class="header">
        <div class="text">
            <h2>All Reservations</h2>
        </div>
        <div class="sub-header">
            <div class="search">
                <div class="input">
                    <input type="text" placeholder="Search by name" id="name">
                    <select name="" id="apartment">
                        <option value="">Select Aparment</option>
                        <option value="All">All</option>
                        <option value="Santiago Apartment">Santiago Apartment</option>
                        <option value="Rodrigo Hirmino Dormitory">Rodrigo Hirmino Dormitory</option>
                        <option value="Jaiden Apartment Complex">Jaiden Apartment Complex</option>
                        <option value="Dysept Apartment">Dysept Apartment</option>
                    </select>
                </div>
                <div class="searchBtn">
                    <svg id="searchBtn" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </div>
            </div>
            <div class="btn">
                <button class="btn-info" id="showApprovedBtn">Show Approved</button>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <br>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Name</th>  
                    <th>Contact Number</th>
                    <th>Apartment</th>
                    <th>Room No</th>
                    <th>Proof of Payment</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody id="reservations-data">
                
            </tbody>
        </table>
    </div>
</div>

<script src="./dependencies/moment.js"></script>
<script src="./js/admin/reserve/reserve.js"></script>