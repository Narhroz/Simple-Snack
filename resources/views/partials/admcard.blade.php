<link rel="stylesheet" href="css/admin.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="js/admin.js" defer></script>
    <div class="cardBox">
        <div class="card">
            <div>
                <div class="numbers">{{ $user }}</div>
                <div class="cardName">Registered Users</div>
            </div>
            <div class="iconBox">
                <ion-icon name="person-sharp"></ion-icon>
            </div>
        </div>
        <div class="card">
            <div>
                <div class="numbers">{{ $items }}</div>
                <div class="cardName">Registered Items</div>
            </div>
            <div class="iconBox">
                <ion-icon name="pricetags"></ion-icon>
            </div>
        </div>
        <div class="card">
            <div>
                <div class="numbers">{{ $admins }}</div>
                <div class="cardName">Admins</div>
            </div>
            <div class="iconBox">
                <ion-icon name="eye-sharp"></ion-icon>
            </div>
        </div>
        <div class="card">
            <div>
                <div class="numbers">Add</div>
                <div class="cardName">Add new products</div>
                <br>
                <a href="/admin/add" class="btn">Add</a>
            </div>
            <div class="iconBox">
                <ion-icon name="bag-add"></ion-icon>
            </div>
        </div>
    </div>