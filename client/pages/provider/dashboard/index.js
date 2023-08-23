import Layout from '@/pages/layout'
import React from 'react'

const Dashboard = () => {
    return (
        <Layout>

            <div className="content">
                <div className="container">
                    <div className="row">
                        <div className="col-xl-3 col-md-4 theiaStickySidebar">
                            <div className="mb-4">
                                <div className="d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
                                    <img alt="profile image" src="assets/img/provider/provider-01.jpg" className="avatar-lg rounded-circle" />
                                    <div className="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                                        <h6 className="mb-0">Thomas Herzberg</h6>
                                        <p className="text-muted mb-0">Member Since Apr 2020</p>
                                    </div>
                                </div>
                            </div>
                            <div className="widget settings-menu">
                                <ul>
                                    <li className="nav-item">
                                        <a href="provider-dashboard.html" className="nav-link active">
                                            <i className="fas fa-chart-line" /> <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="my-services.html" className="nav-link">
                                            <i className="far fa-address-book" /> <span>My Services</span>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="provider-bookings.html" className="nav-link">
                                            <i className="far fa-calendar-check" /> <span>Booking List</span>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="provider-settings.html" className="nav-link">
                                            <i className="far fa-user" /> <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="provider-wallet.html" className="nav-link">
                                            <i className="far fa-money-bill-alt" /> <span>Wallet</span>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="provider-subscription.html" className="nav-link">
                                            <i className="far fa-calendar-alt" /> <span>Subscription</span>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="provider-availability.html" className="nav-link">
                                            <i className="far fa-clock" /> <span>Availability</span>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="provider-reviews.html" className="nav-link">
                                            <i className="far fa-star" /> <span>Reviews</span>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="provider-payment.html" className="nav-link">
                                            <i className="fas fa-hashtag" /> <span>Payment</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-xl-9 col-md-8">
                            <h4 className="widget-title">Dashboard</h4>
                            <div className="row">
                                <div className="col-lg-4">
                                    <a href="provider-bookings.html" className="dash-widget dash-bg-1">
                                        <span className="dash-widget-icon">245</span>
                                        <div className="dash-widget-info">
                                            <span>Bookings</span>
                                        </div>
                                    </a>
                                </div>
                                <div className="col-lg-4">
                                    <a href="my-services.html" className="dash-widget dash-bg-2">
                                        <span className="dash-widget-icon">66</span>
                                        <div className="dash-widget-info">
                                            <span>Services</span>
                                        </div>
                                    </a>
                                </div>
                                <div className="col-lg-4">
                                    <a href="notifications.html" className="dash-widget dash-bg-3">
                                        <span className="dash-widget-icon">8</span>
                                        <div className="dash-widget-info">
                                            <span>Notification</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div className="card mb-0">
                                <div className="row no-gutters">
                                    <div className="col-lg-8">
                                        <div className="card-body">
                                            <h6 className="title">Plan Details</h6>
                                            <div className="sp-plan-name">
                                                <h6 className="title">
                                                    Gold <span className="badge badge-success badge-pill">Active</span>
                                                </h6>
                                                <p>Subscription ID: <span className="text-base">100394949</span></p>
                                            </div>
                                            <ul className="row">
                                                <li className="col-6 col-lg-6">
                                                    <p>Started On 15 Jul, 2020</p>
                                                </li>
                                                <li className="col-6 col-lg-6">
                                                    <p>Price $1502.00</p>
                                                </li>
                                            </ul>
                                            <h6 className="title">Last Payment</h6>
                                            <ul className="row">
                                                <li className="col-sm-6">
                                                    <p>Paid at 15 Jul 2020</p>
                                                </li>
                                                <li className="col-sm-6">
                                                    <p><span className="text-success">Paid</span>  <span className="amount">$1502.00</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div className="col-lg-4">
                                        <div className="sp-plan-action card-body">
                                            <div className="mb-2">
                                                <a href="provider-subscription.html" className="btn btn-primary"><span>Change Plan</span></a>
                                            </div>
                                            <div className="next-billing">
                                                <p>Next Billing on <span>15 Jul, 2021</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </Layout>
    )
}

export default Dashboard