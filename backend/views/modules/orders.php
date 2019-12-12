<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

if(!isset($_SESSION["validar"])){
  header("location:login");

  exit();
}
?>
    <main>
        <?php 
            include "header.php"; 
        ?>
        <div id="wrapper">
            <?php 
              include "left-sidebar.php"; 
            ?>
            <div class="content-wrapper">
                <div class="content custom-scrollbar">

                    <div id="e-commerce-orders" class="page-layout carded full-width">

                        <div class="top-bg bg-primary"></div>

                        <!-- CONTENT -->
                        <div class="page-content-wrapper">

                            <!-- HEADER -->
                            <div class="page-header light-fg row no-gutters align-items-center justify-content-between">

                                <!-- APP TITLE -->
                                <div class="col-12 col-sm">

                                    <div class="logo row no-gutters justify-content-center align-items-start justify-content-sm-start">

                                        <div class="logo-icon mr-3 mt-1">
                                            <i class="icon-cart-outline s-6"></i>
                                        </div>

                                        <div class="logo-text">
                                            <div class="h4">Orders</div>
                                            <div class="">Total Orders: 20</div>
                                        </div>

                                    </div>
                                </div>
                                <!-- / APP TITLE -->

                                <!-- SEARCH -->
                                <div class="col search-wrapper pl-2">

                                    <div class="input-group">

                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-icon">
                                                <i class="icon icon-magnify"></i>
                                            </button>
                                        </span>

                                        <input id="orders-search-input" type="text" class="form-control" placeholder="Search" aria-label="Search" />

                                    </div>
                                </div>
                                <!-- / SEARCH -->
                            </div>
                            <!-- / HEADER -->

                            <div class="page-content-card">

                                <table id="e-commerce-orders-table" class="table dataTable">

                                    <thead>

                                        <tr>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">ID</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Reference</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Customer</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Total</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Payment</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Status</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Date</span>
                                                </div>
                                            </th>

                                            <th>
                                                <div class="table-header">
                                                    <span class="column-title">Actions</span>
                                                </div>
                                            </th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>70d4d7d0</td>
                                            <td>Dollie Bullock</td>
                                            <td>73.31</td>
                                            <td>Credit Card</td>
                                            <td>
                                                <span class='badge badge-info'>On pre-order (not paid)</span>
                                            </td>
                                            <td class="date">2015/04/25 02:07:59</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>2003479c</td>
                                            <td>Holmes Hines</td>
                                            <td>24.51</td>
                                            <td>Check</td>
                                            <td>
                                                <span class='badge badge-success'>Payment accepted</span>
                                            </td>
                                            <td class="date">2015/11/07 15:47:31</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>09f5443b</td>
                                            <td>Serena Glover</td>
                                            <td>87.17</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class='badge badge-danger'>Payment error</span>
                                            </td>
                                            <td class="date">2015/11/26 16:04:40</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>960898d0</td>
                                            <td>Dianne Prince</td>
                                            <td>26.98</td>
                                            <td>Check</td>
                                            <td>
                                                <span class='badge badge-success'>Delivered</span>
                                            </td>
                                            <td class="date">2015/11/23 05:35:18</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>5</td>
                                            <td>2d7f68de</td>
                                            <td>Frankie Hewitt</td>
                                            <td>12.97</td>
                                            <td>Bank-wire</td>
                                            <td>
                                                <span class='badge badge-danger'>Payment error</span>
                                            </td>
                                            <td class="date">2015/01/13 06:21:21</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>6</td>
                                            <td>9c991708</td>
                                            <td>Cole Holcomb</td>
                                            <td>30.96</td>
                                            <td>Check</td>
                                            <td>
                                                <span class='badge badge-warning'>Preparing the order</span>
                                            </td>
                                            <td class="date">2015/01/17 04:21:08</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>7</td>
                                            <td>7683b54d</td>
                                            <td>Merrill Richardson</td>
                                            <td>63.36</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class='badge badge-info'>Awaiting PayPal payment</span>
                                            </td>
                                            <td class="date">2015/06/14 14:49:47</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>8</td>
                                            <td>c1de0f75</td>
                                            <td>Morgan Pitts</td>
                                            <td>45.74</td>
                                            <td>Credit Card</td>
                                            <td>
                                                <span class='badge badge-warning'>Shipped</span>
                                            </td>
                                            <td class="date">2015/01/18 01:31:47</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>9</td>
                                            <td>35a4dbc6</td>
                                            <td>Krista Mathis</td>
                                            <td>15.31</td>
                                            <td>Bank-wire</td>
                                            <td>
                                                <span class='badge badge-success'>Remote payment accepted</span>
                                            </td>
                                            <td class="date">2016/02/14 14:22:58</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>10</td>
                                            <td>a8bc5b17</td>
                                            <td>Hayden Fitzgerald</td>
                                            <td>20.97</td>
                                            <td>Credit Card</td>
                                            <td>
                                                <span class='badge badge-success'>Delivered</span>
                                            </td>
                                            <td class="date">2015/10/23 03:02:55</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>11</td>
                                            <td>54ab8191</td>
                                            <td>Cotton Carlson</td>
                                            <td>72.30</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class='badge badge-success'>On pre-order (paid)</span>
                                            </td>
                                            <td class="date">2015/07/28 13:22:49</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>12</td>
                                            <td>6.91905e&#43;06</td>
                                            <td>Kaye Baldwin</td>
                                            <td>42.54</td>
                                            <td>Credit Card</td>
                                            <td>
                                                <span class='badge badge-info'>Awaiting bank wire payment</span>
                                            </td>
                                            <td class="date">2015/06/07 17:54:36</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>13</td>
                                            <td>1d4e89f0</td>
                                            <td>Iva Clark</td>
                                            <td>97.49</td>
                                            <td>Check</td>
                                            <td>
                                                <span class='badge badge-default'>Canceled</span>
                                            </td>
                                            <td class="date">2016/02/06 13:26:55</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>14</td>
                                            <td>d897564e</td>
                                            <td>Shauna Rosales</td>
                                            <td>16.95</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class='badge badge-danger'>Refunded</span>
                                            </td>
                                            <td class="date">2016/01/17 04:23:11</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>15</td>
                                            <td>1a803de2</td>
                                            <td>Carroll Dotson</td>
                                            <td>20.34</td>
                                            <td>Check</td>
                                            <td>
                                                <span class='badge badge-info'>Awaiting check payment</span>
                                            </td>
                                            <td class="date">2015/09/26 14:26:33</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>16</td>
                                            <td>7d90eaa6</td>
                                            <td>Jeannie Reese</td>
                                            <td>10.64</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class='badge badge-default'>On pre-order (paid)</span>
                                            </td>
                                            <td class="date">2015/08/10 14:28:10</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>17</td>
                                            <td>cf9b4bfc</td>
                                            <td>Dena Rowe</td>
                                            <td>27.06</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class='badge badge-success'>Delivered</span>
                                            </td>
                                            <td class="date">2015/11/10 16:54:11</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>18</td>
                                            <td>07a938c4</td>
                                            <td>Blankenship Lynch</td>
                                            <td>91.50</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class='badge badge-default'>Canceled</span>
                                            </td>
                                            <td class="date">2015/08/26 16:24:38</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>19</td>
                                            <td>d460f4ff</td>
                                            <td>Whitley Mcgee</td>
                                            <td>47.99</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class='badge badge-danger'>Refunded</span>
                                            </td>
                                            <td class="date">2015/01/04 21:13:53</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>20</td>
                                            <td>ba6a946d</td>
                                            <td>Hood Hodges</td>
                                            <td>44.40</td>
                                            <td>PayPal</td>
                                            <td>
                                                <span class='badge badge-info'>Awaiting bank wire payment</span>
                                            </td>
                                            <td class="date">2015/02/24 00:57:18</td>
                                            <td>
                                                <button type="button" class="btn btn-icon" aria-label="Product details">
                                                    <i class="icon icon-dots-horizontal s-4"></i>
                                                </button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- / CONTENT -->
                    </div>

                    <script type="text/javascript" src="views/js/apps/e-commerce/orders/orders.js"></script>

                </div>
            </div>
            
            <?php 
              include "right-sidebar.php"; 
            ?>

        </div>
        <?php 
        include "footer.php"; 
      ?> 
    </main>