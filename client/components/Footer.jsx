import React from 'react'

const Footer = () => {
    return (
        <footer className="footer">
            <div className="footer-top aos" data-aos="fade-up">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-3 col-md-6">
                            <div className="footer-widget footer-menu">
                                <h2 className="footer-title">Quick Links</h2>
                                <ul>
                                    <li>
                                        <a href="about-us.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact-us.html">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="faq.html">Faq</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-lg-3 col-md-6">
                            <div className="footer-widget footer-menu">
                                <h2 className="footer-title">Categories</h2>
                                <ul>
                                    <li>
                                        <a href="search.html">Computer</a>
                                    </li>
                                    <li>
                                        <a href="search.html">Interior</a>
                                    </li>
                                    <li>
                                        <a href="search.html">Car Wash</a>
                                    </li>
                                    <li>
                                        <a href="search.html">Cleaning</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-lg-3 col-md-6">
                            <div className="footer-widget footer-contact">
                                <h2 className="footer-title">Contact Us</h2>
                                <div className="footer-contact-info">
                                    <div className="footer-address">
                                        <span><i className="far fa-building" /></span>
                                        <p>367 Hillcrest Lane, Irvine, California, United States</p>
                                    </div>
                                    <p><i className="fas fa-headphones" /> 321 546 8764</p>
                                    <p className="mb-0"><i className="fas fa-envelope" /> <a href="https://html.truelysell.com/cdn-cgi/l/email-protection" className="__cf_email__" data-cfemail="d0a4a2a5b5bca9a3b5bcbc90b5a8b1bda0bcb5feb3bfbd">[email&nbsp;protected]</a></p>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-3 col-md-6">
                            <div className="footer-widget">
                                <h2 className="footer-title">Follow Us</h2>
                                <div className="social-icon">
                                    <ul>
                                        <li>
                                            <a href="#" target="_blank"><i className="fab fa-facebook-f" /> </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i className="fab fa-twitter" /> </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i className="fab fa-youtube" /></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i className="fab fa-google" /></a>
                                        </li>
                                    </ul>
                                </div>
                                <div className="subscribe-form">
                                    <input type="email" className="form-control" placeholder="Enter your email" />
                                    <button type="submit" className="btn footer-btn">
                                        <i className="fas fa-paper-plane" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="footer-bottom">
                <div className="container">
                    <div className="copyright">
                        <div className="row">
                            <div className="col-md-6 col-lg-6">
                                <div className="copyright-text">
                                    <p className="mb-0">© 2022 <a href="index.html">Truelysell</a>. All rights reserved.</p>
                                </div>
                            </div>
                            <div className="col-md-6 col-lg-6">
                                <div className="copyright-menu">
                                    <ul className="policy-menu">
                                        <li>
                                            <a href="term-condition.html">Terms and Conditions</a>
                                        </li>
                                        <li>
                                            <a href="privacy-policy.html">Privacy</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    )
}

export default Footer