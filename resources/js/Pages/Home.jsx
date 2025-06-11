import React from 'react'
import ClientMainLayout from '../layouts/client/ClientMainLayout'
import { Head } from '@inertiajs/react'

const Home = () => {
  return (
    <React.Fragment>
        <Head>
            <title>ACME</title>
            <meta name="description" content="ACME Home Page" />
        </Head>
        <ClientMainLayout>
            <div className="text-red-600" >Home</div>
        </ClientMainLayout>
    </React.Fragment>
  )
}

export default Home