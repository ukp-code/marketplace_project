import Image from 'next/image'
import styles from '@/styles/Home.module.css'
import PopularService from '@/components/home/PopularService'
import Layout from './layout'
import HeroSection from '@/components/home/HeroSection'
import CategorySection from '@/components/home/CategorySection'
import HowItWorks from '@/components/home/HowItWorks'
import OurApp from '@/components/home/OurApp'
import { useEffect, useState } from 'react'
import axiosInstance from '@/utils/axiosInstance'
import axios from 'axios'


export default function Home({ categories }) {

  return (
    <>
      <Layout>
        <HeroSection />
        <CategorySection categories={categories} />
        <PopularService />
        <HowItWorks />
        <OurApp />
      </Layout>
    </>
  )
}

export async function getServerSideProps() {
  const res = await axiosInstance.get('featured-categories')
  const data = await res.data
  return { props: { categories: data.categories } }
}
