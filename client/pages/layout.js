import React from 'react'
import Head from 'next/head'
import Header from '@/components/Header'
import Footer from '@/components/Footer'

const Layout = ({ children }) => {
    return (
        <>
            <Head>
                <meta charSet="utf-8" />
                <title>Truelysell | Template</title>
                <meta name="description" content="Generated by create next app" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
                <link rel="shortcut icon" href="/assets/img/favicon.png" />
                <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet" />
                <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css" />
                <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css" />
                <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css" />
                <link rel="stylesheet" href="/assets/plugins/owlcarousel/owl.carousel.min.css" />
                <link rel="stylesheet" href="/assets/plugins/owlcarousel/owl.theme.default.min.css" />
                <link rel="stylesheet" href="/assets/plugins/aos/aos.css" />
                <link rel="stylesheet" href="/assets/css/style.css" />
                <script src="/assets/js/jquery-3.6.0.min.js"></script>

                <script src="/assets/js/popper.min.js"></script>
                <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

                <script src="/assets/plugins/owlcarousel/owl.carousel.min.js"></script>

                <script src="/assets/plugins/aos/aos.js"></script>
                <script src="/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
                <script src="/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

                <script src="/assets/js/script.js"></script>
            </Head>

            <div className="main-wrapper">
                <Header />
                {children}
                <Footer />
            </div>
        </>
    )
}

export default Layout