import React from 'react'
import Navbar from '../../components/Navbar'

const ClientMainLayout = ({children}) => {
  return (
    <React.Fragment>
        <Navbar />
        {children}
    </React.Fragment>
  )
}

export default ClientMainLayout