import Head from 'next/head'
import Link from 'next/link'
import React from 'react'

const AdminLayout = ({children}) => {
    return (
        <>
            <Head>
                <meta charSet="utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
                <title>Truelysell | Admin</title>
                <link rel="shortcut icon" href="/adminAssets/img/favicon.png" />
                <link rel="stylesheet" href="/adminAssets/plugins/bootstrap/css/bootstrap.min.css" />
                <link rel="stylesheet" href="/adminAssets/plugins/fontawesome/css/fontawesome.min.css" />
                <link rel="stylesheet" href="/adminAssets/plugins/fontawesome/css/all.min.css" />
                <link rel="stylesheet" href="/adminAssets/css/animate.min.css" />
                <link rel="stylesheet" href="/adminAssets/css/admin.css" />

                <script src="/adminAssets/js/jquery-3.6.0.min.js"></script>

                <script src="/adminAssets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

                <script src="/adminAssets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

                <script src="/adminAssets/js/admin.js"></script>
            </Head>
            <div className="main-wrapper">
                {/* Header */}
                <div className="header">
                    <div className="header-left">
                        <a href="index.html" className="logo logo-small">
                            <img src="/adminAssets/img/logo-icon.png" alt="Logo" width={30} height={30} />
                        </a>
                    </div>
                    <a href="javascript:void(0);" id="toggle_btn">
                        <i className="fas fa-align-left" />
                    </a>
                    <a className="mobile_btn" id="mobile_btn" href="javascript:void(0);">
                        <i className="fas fa-align-left" />
                    </a>
                    <ul className="nav user-menu">
                        {/* Notifications */}
                        <li className="nav-item dropdown noti-dropdown">
                            <a href="#" className="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                                <i className="far fa-bell" />  <span className="badge badge-pill" />
                            </a>
                            <div className="dropdown-menu notifications">
                                <div className="topnav-dropdown-header">
                                    <span className="notification-title">Notifications</span>
                                    <a href="javascript:void(0)" className="clear-noti"> Clear All </a>
                                </div>
                                <div className="noti-content">
                                    <ul className="notification-list">
                                        <li className="notification-message">
                                            <a href="admin-notification.html">
                                                <div className="media d-flex">
                                                    <span className="avatar avatar-sm flex-shrink-0">
                                                        <img className="avatar-img rounded-circle" alt src="assets/img/provider/provider-01.jpg" />
                                                    </span>
                                                    <div className="media-body flex-grow-1">
                                                        <p className="noti-details">
                                                            <span className="noti-title">Thomas Herzberg have been subscribed</span>
                                                        </p>
                                                        <p className="noti-time">
                                                            <span className="notification-time">15 Sep 2020 10:20 PM</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li className="notification-message">
                                            <a href="admin-notification.html">
                                                <div className="media d-flex">
                                                    <span className="avatar avatar-sm flex-shrink-0">
                                                        <img className="avatar-img rounded-circle" alt src="assets/img/provider/provider-02.jpg" />
                                                    </span>
                                                    <div className="media-body flex-grow-1">
                                                        <p className="noti-details">
                                                            <span className="noti-title">Matthew Garcia have been subscribed</span>
                                                        </p>
                                                        <p className="noti-time">
                                                            <span className="notification-time">13 Sep 2020 03:56 AM</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li className="notification-message">
                                            <a href="admin-notification.html">
                                                <div className="media d-flex">
                                                    <span className="avatar avatar-sm flex-shrink-0">
                                                        <img className="avatar-img rounded-circle" alt src="assets/img/provider/provider-03.jpg" />
                                                    </span>
                                                    <div className="media-body flex-grow-1">
                                                        <p className="noti-details">
                                                            <span className="noti-title">Yolanda Potter have been subscribed</span>
                                                        </p>
                                                        <p className="noti-time">
                                                            <span className="notification-time">12 Sep 2020 09:25 PM</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li className="notification-message">
                                            <a href="admin-notification.html">
                                                <div className="media d-flex">
                                                    <span className="avatar avatar-sm flex-shrink-0">
                                                        <img className="avatar-img rounded-circle" alt="User Image" src="assets/img/provider/provider-04.jpg" />
                                                    </span>
                                                    <div className="media-body flex-grow-1">
                                                        <p className="noti-details">
                                                            <span className="noti-title">Ricardo Flemings have been subscribed</span>
                                                        </p>
                                                        <p className="noti-time">
                                                            <span className="notification-time">11 Sep 2020 06:36 PM</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li className="notification-message">
                                            <a href="admin-notification.html">
                                                <div className="media d-flex">
                                                    <span className="avatar avatar-sm flex-shrink-0">
                                                        <img className="avatar-img rounded-circle" alt="User Image" src="assets/img/provider/provider-05.jpg" />
                                                    </span>
                                                    <div className="media-body flex-grow-1">
                                                        <p className="noti-details">
                                                            <span className="noti-title">Maritza Wasson have been subscribed</span>
                                                        </p>
                                                        <p className="noti-time">
                                                            <span className="notification-time">10 Sep 2020 08:42 AM</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li className="notification-message">
                                            <a href="admin-notification.html">
                                                <div className="media d-flex">
                                                    <span className="avatar avatar-sm flex-shrink-0">
                                                        <img className="avatar-img rounded-circle" alt="User Image" src="assets/img/provider/provider-06.jpg" />
                                                    </span>
                                                    <div className="media-body flex-grow-1">
                                                        <p className="noti-details">
                                                            <span className="noti-title">Marya Ruiz have been subscribed</span>
                                                        </p>
                                                        <p className="noti-time">
                                                            <span className="notification-time">9 Sep 2020 11:01 AM</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li className="notification-message">
                                            <a href="admin-notification.html">
                                                <div className="media d-flex">
                                                    <span className="avatar avatar-sm flex-shrink-0">
                                                        <img className="avatar-img rounded-circle" alt="User Image" src="assets/img/provider/provider-07.jpg" />
                                                    </span>
                                                    <div className="media-body flex-grow-1">
                                                        <p className="noti-details">
                                                            <span className="noti-title">Richard Hughes have been subscribed</span>
                                                        </p>
                                                        <p className="noti-time">
                                                            <span className="notification-time">8 Sep 2020 06:23 AM</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div className="topnav-dropdown-footer">
                                    <a href="admin-notification.html">View all Notifications</a>
                                </div>
                            </div>
                        </li>
                        {/* /Notifications */}
                        {/* User Menu */}
                        <li className="nav-item dropdown">
                            <a href="javascript:void(0)" className="dropdown-toggle user-link  nav-link" data-bs-toggle="dropdown">
                                <span className="user-img">
                                    <img className="rounded-circle" src="assets/img/user.jpg" width={40} alt="Admin" />
                                </span>
                            </a>
                            <div className="dropdown-menu dropdown-menu-end">
                                <a className="dropdown-item" href="admin-profile.html">Profile</a>
                                <a className="dropdown-item" href="login.html">Logout</a>
                            </div>
                        </li>
                        {/* /User Menu */}
                    </ul>
                </div>
                {/* /Header */}
                {/* Sidebar */}
                <div className="sidebar" id="sidebar">
                    <div className="sidebar-logo">
                        <Link href="/">
                            <img src="/adminAssets/img/logo-icon.png" className="img-fluid" alt />
                        </Link>
                    </div>
                    <div className="sidebar-inner slimscroll">
                        <div id="sidebar-menu" className="sidebar-menu">
                            <ul>
                                <li className="active">
                                    <a href="index.html"><i className="fas fa-columns" /> <span>Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="categories.html"><i className="fas fa-layer-group" /> <span>Categories</span></a>
                                </li>
                                <li>
                                    <a href="subcategories.html"><i className="fab fa-buffer" /> <span>Sub Categories</span></a>
                                </li>
                                <li>
                                    <a href="service-list.html"><i className="fas fa-bullhorn" /> <span> Services</span></a>
                                </li>
                                <li>
                                    <a href="total-report.html"><i className="far fa-calendar-check" /> <span> Booking List</span></a>
                                </li>
                                <li>
                                    <a href="payment_list.html"><i className="fas fa-hashtag" /> <span>Payments</span></a>
                                </li>
                                <li>
                                    <a href="ratingstype.html"><i className="fas fa-star-half-alt" /> <span>Rating Type</span></a>
                                </li>
                                <li>
                                    <a href="review-reports.html"><i className="fas fa-star" /> <span>Ratings</span></a>
                                </li>
                                <li>
                                    <a href="subscriptions.html"><i className="far fa-calendar-alt" /> <span>Subscriptions</span></a>
                                </li>
                                <li>
                                    <a href="wallet.html"><i className="fas fa-wallet" /> <span> Wallet</span></a>
                                </li>
                                <li>
                                    <a href="service-providers.html"><i className="fas fa-user-tie" /> <span> Service Providers</span></a>
                                </li>
                                <li>
                                    <a href="users.html"><i className="fas fa-user" /> <span>Users</span></a>
                                </li>
                                <li className="submenu">
                                    <a href="#"><i className="fas fa-clipboard" /> <span> Invoices</span>
                                        <span className="menu-arrow"><i className="fas fa-angle-right" /></span>
                                    </a>
                                    <ul>
                                        <li><a href="invoices.html">Invoices List</a></li>
                                        <li><a href="invoice-grid.html">Invoices Grid</a></li>
                                        <li><a href="add-invoice.html">Add Invoices</a></li>
                                        <li><a href="edit-invoice.html">Edit Invoices</a></li>
                                        <li><a href="view-invoice.html">Invoices Details</a></li>
                                        <li><a href="invoices-settings.html">Invoices Settings</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="settings.html"><i className="fas fa-cog" /> <span>Settings</span></a>
                                </li>
                                <li className="submenu">
                                    <a href="#"><i className="fas fa-cog" /> <span> Frontend Settings</span>
                                        <span className="menu-arrow"><i className="fas fa-angle-right" /></span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="front-settings.html"> <span> Header Settings</span></a>
                                        </li>
                                        <li>
                                            <a href="footer-settings.html"> <span>Footer Settings</span></a>
                                        </li>
                                        <li>
                                            <a href="pages.html"> <span>Pages </span></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {/* /Sidebar */}
                {children}
            </div>
        </>
    )
}

export default AdminLayout