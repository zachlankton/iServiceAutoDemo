import { Edit } from 'react-admin';
import CustomerForm from "components/Customers/CustomerForm"

const CustomerEdit = (props) => (
    <>
    <h1>Edit Customer</h1>
    <Edit {...props} title="Customer" >
        <CustomerForm />
    </Edit>
    </>
)

export default CustomerEdit;
