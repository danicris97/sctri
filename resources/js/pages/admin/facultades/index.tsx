import AppLayout from '@/layouts/app-layout';
import React from 'react';
import { type BreadcrumbItem } from '@/types';
import { useForm } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import { Modal } from '@/components/ui/modal';
import { usePage } from '@inertiajs/react';
import { type PageProps } from '@/types';
import { Head, router } from '@inertiajs/react';
import { FacultadForm } from '@/components/forms/facultad-form';
import { CustomPagination } from '@/components/ui/custom-pagination';
import { SuccessAlert } from '@/components/ui/custom-alert';
import PasantiasLayout from '@/layouts/pasantias/layout';
import { PencilIcon, TrashIcon, PlusCircleIcon } from "lucide-react";


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/admin',
    },
    {
        title: 'Facultades',
        href: '/admin/facultades',
    },
];

export default function FacultadesIndex({ facultades }: {
    facultades: {
        data: Array<{ id: number, nombre: string }>,
        links: Array<{ url: string | null, label: string, active: boolean }>,
    }
}) {    
    const [isCreateDialogOpen, setIsCreateDialogOpen] = React.useState(false);
    const [isEditDialogOpen, setIsEditDialogOpen] = React.useState(false);
    const [isDeleteDialogOpen, setIsDeleteDialogOpen] = React.useState(false);
    const [currentFacultad, setCurrentFacultad] = React.useState<{ id: number; nombre: string } | null>(null);
    const { processing, errors } = useForm({
        nombre: ""
    });

    const { links } = facultades;
    const { props } = usePage<PageProps>();
    const { flash } = props;

    // Handle delete action
    const handleDelete = (id: number) => {
        router.delete(`/admin/facultades/${id}`, {
            onSuccess: () => {
                setIsDeleteDialogOpen(false);
                setCurrentFacultad(null);
            },
        });
    };

    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <PasantiasLayout>
                <Head title="Convenios" />
                <div className="space-y-6 p-6">
                    {/* Alertas de éxito */}
                    {flash?.success && (
                        <SuccessAlert message={flash.success} />
                    )}

                    {/* Encabezado y botón de acción */}
                    <div className="flex items-center justify-between">
                        <div>
                            <h1 className="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Facultades
                            </h1>
                            <p className="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Administra las facultades registradas
                            </p>
                        </div>

                        <Modal
                            open={isCreateDialogOpen}
                            onOpenChange={setIsCreateDialogOpen}
                            title="Crear Facultad"
                            trigger={
                                <Button className="gap-2">
                                    <PlusCircleIcon className="h-4 w-4" />
                                    Nueva Facultad
                                </Button>
                            }
                            showCancelButton={false}
                        >                            
                            <FacultadForm
                                initialData={{ nombre: "" }}
                                onSubmitRoute="/admin/facultades"
                                onSuccess={() => setIsCreateDialogOpen(false)}
                                processing={processing}
                                errors={errors}
                            />
                        </Modal>
                    </div>

                    {/* Tabla de resultados */}
                    <div className="rounded-lg border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-950 shadow-sm">
                       <p>AQUI VA LA TABLA</p>
                    </div>

                    {/* Paginación */}
                    {links.length > 3 && (
                        <div className="flex items-center justify-end">
                            <CustomPagination 
                                links={links} 
                                className="mt-4"
                                showIcons={true}
                                compact={false}
                            />
                        </div>
                    )}
                </div>
            </PasantiasLayout>
        </AppLayout>
    );
}