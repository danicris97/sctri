import AdminLayout from '@/layouts/admin/admin-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Pasantias',
        href: '/Pasantias',
    },
];

export default function Pasantias() {
    return (
        <AdminLayout breadcrumbs={breadcrumbs}>
            <Head title="Pasantias" />
            
        </AdminLayout>
    );
}