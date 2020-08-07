-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2020 a las 20:59:01
-- Versión del servidor: 5.6.17
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hotel`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addCuarto`( in tipoCuarto_idTipoCuarto_p int, in numCuarto_p varchar(50), estatus_p varchar(50))
begin
	declare cantidad int; 
    select count(*) into cantidad from cuartos where trim(numCuarto) = trim(numCuarto_p); 
    
	if length(trim(tipoCuarto_idTipoCuarto_p)) = "" then
		select concat("no puede ir vacio el campo tipo cuarto ", tipoCuarto_idTipoCuarto_p);
        
        else if length(trim(numCuarto_p)) = "" then 
			select concat("recuerda llenar el numero del cuarto ", numCuarto_p);
		
			else if estatus_p = "" then
				select concat("recuerda llenar el estatus del cuarto ", estatus_p);
                
				else if cantidad > 0 then
					SELECT CONCAT("Ya existe este número de cuarto ", numCuarto_p);
				else
					insert into cuartos values(null, tipoCuarto_idTipoCuarto_p, numCuarto_p, estatus_p);
					
				end if;
            end if;    
		end if;
    end if;     

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addCuenta`( in reservaciones_idReservacion_p int, in cuartos_idCuarto_p int)
begin 
	declare precioDias double;
    declare estatusCuarto varchar(50); 
    declare diasEstancia int;
	declare total_p double; 
	
    select estatus from cuartos where idCuarto = cuartos_idCuarto_p into estatusCuarto;
    
	if length(trim(reservaciones_idReservacion_p)) = "" then
		select concat("ingresa el id correcto de la reservacion", reservaciones_idReservacion_p);
		
        else if length(trim(cuartos_idCuarto_p)) = "" then 
			select concat("ingresa el id correcto del cuarto", cuartos_isCuarto_p);
            
            else if estatusCuarto = 'OCUPADO' then 
				select concat("El cuarto no se encuantra disponible", cuartos_idCuarto_p); 
            else 
				select estancia from reservaciones where idReservacion = reservaciones_idReservacion_p into diasEstancia;
				select precioCuarto from tipoCuarto join cuartos on cuartos.tipoCuarto_idTipoCuarto = idTipoCuarto where idCuarto = cuartos_idCuarto_p into precioDias;
				select precioDias * diasEstancia into total_p;
                
                insert into cuenta values(null,reservaciones_idReservacion_p, cuartos_idCuarto_p, null, total_p);
            end if; 
        end if;     
    end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addPersona`(in nombre_p varchar(50), in apellido1_p varchar(50), in apellido2_p varchar(50), in pass_p varchar(50), in privilegios_p varchar(50), in numTelefono_p varchar(20))
begin 
	declare cantidad int; 
    select count(*) into cantidad from personas where trim(pass) = trim(pass_p);
    
    if length(trim(nombre_p)) = "" then
			select concat("no puede ir vacio el campo de nombre ", nombre_p)as mensaje;
        
			else if length(trim(apellido1_p)) = "" then
				select concat("no puede ir vacion el campo de apellido", apellido1_p);
                
                else if length(trim(apellido2_p)) = "" then
					select concat("no puede ir vacion el campo de apellido", apellido2_p);
					
                    else if length(trim(pass_p)) = "" then 
						select concat("no puede ir vacio el campo de la contraseña", pass_p);
                        
							else if length(trim(privilegios_p)) = "" then 
								select concat("revisa los privilegios", privilegios_p); 
                                
									else if length(trim(numTelefono_p)) = "" then 
										select concat("verifica que el campo de número de telefono este llenado ", numTelefono_p); 
										
										else if trim(privilegios_p) = 1 then
											insert into personas values(null, null, nombre_p, apellido1_p, apellido2_p, pass_p, privilegios_p);
											insert into telefonos values(null, numTelefono_p);
                                            insert into clientes values(null, null);
											
											call sp_comCliente();
                                            
											else 
												insert into personas values(null, null, nombre_p, apellido1_p, apellido2_p, pass_p, privilegios_p);
												insert into telefonos values(null, numTelefono_p);
												insert into recepcionistas values(null, null);
                                                
                                                call sp_comRecepcionista();
												
										
									end if;	
                            end if; 
                        end if; 
                    end if; 
                end if;
            end if;    
        end if;
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addReservaciones`( in clientes_idCliente_p int, in fechaEntrada_p varchar(20), in fechaSalida_p varchar(20), in estancia_p int, in aprovado_p varchar(50))
begin 
     declare dif_fecha int;
	
     SELECT DATEDIFF(fechaSalida_p,fechaEntrada_p) into estancia_p;
      
     if dif_fecha < 0 then 
		select concat("Las fechas no estan ordenadas correctamente");
			
			else if length(trim(clientes_idCliente_p)) = "" then
				select concat("no puede ir vacio el idCliente", clientes_idCliente_p);
			
				else if length(trim(fechaEntrada_p)) = "" then
					select concat("no puede ir vacio la fecha de entrada", fechaEntrada_p);
						
					else if length(trim(fechaSalida_p)) = "" then
						select concat("no puede ir vacio la fecha de salida", fechaSalida_p);
						
					else
                    
						insert into reservaciones values(null,clientes_idCliente_p, fechaEntrada_p, fechaSalida_p, estancia_p, aprovado_p);
							   
					end if;        
				end if;            
			end if; 
		end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addServicios`( in nombreServicio_p varchar(50), in descripcion_p varchar(50), precioServicio_p double)
begin
	declare cantidad int; 
    select count(*) into cantidad from servicios where trim(nombreServicio) = trim(nombreServicio_p); 
    
	if length(trim(nombreServicio_p)) = "" then
		select concat("no puede ir vacio el nombre del servicio ", nombreServicio_p);
        
        else if length(trim(descripcion_p)) = "" then 
			select concat("no puede ir vacio la descripción del servicio", descripcion_p); 
            
			else if cantidad > 0 then
					SELECT CONCAT("Ya existe este servicio ", nombreServicio_p);
            
				else if length(trim(precioServicio_p)) < 0 then 
					select concat("recuerda llenar el precio del servicio ", precioServicio_p);
			
					else if precioServicio_p <= 0 then
							select concat("recuerda llenar el precio con cantidades mayores a cero ", precioServicio_p);
						else 
						 insert into servicios values (null, nombreServicio_p, descripcion_p, precioServicio_p);
					
					end if; 
				end if;   
            end if;
        end if; 
	end if;         

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_addTipoCuarto`( in tipoCuarto_p varchar(50), in precioCuarto_p double)
begin
	declare cantidad int; 
    select count(*) into cantidad from tipoCuarto where trim(tipoCuarto) = trim(tipoCuarto_p); 
    
	if length(trim(tipoCuarto_p)) = "" then
		select concat("no puede ir vacio el campo tipo cuarto ", tipoCuarto_p);
        
        else if length(trim(precioCuarto_p)) < 0 then 
			select concat("recuerda llenar el precio del tipo de cuarto ", precioCuarto_p);
		
			else if precioCuarto_p <= 0 then
				select concat("recuerda llenar el precio con cantidades mayores a cero ", precioCuarto_p);
                
				else if cantidad > 0 then
					SELECT CONCAT("Ya existe este tipo de cuarto ", tipoCuarto_p);
				else
					insert into tipoCuarto values(null,tipoCuarto_p, precioCuarto_p);
					
				end if;
            end if;    
		end if;
    end if;     

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_agregarServicioCuenta`(in idCuenta_p int, in idServicio_p int)
begin
	declare precio1 double; 
    declare costoServicio double; 
    declare totalFinal double; 
	
    select total from cuenta where idCuenta = idCuenta_p into precio1;
    
    update cuenta set servicios_idServicio = idServicio_p where idCuenta = idCuenta_p;
    
    select precioServicio from servicios join cuenta on cuenta.servicios_idServicio = servicios.idServicio where idCuenta = idCuenta_p into costoServicio;
    
    select precio1 + costoServicio into totalFinal;
  
	update cuenta set total = totalFinal where idCuenta = idCuenta_p; 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscadorCuarto`(in numCuarto_p varchar(50))
begin
select * from cuartos where numCuarto like numCuarto_p;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarPorIdCuarto`(in idCuarto_p int)
begin
	SELECT * FROM cuartos WHERE idCuarto = idCuarto_p;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarPorIdCuenta`(in idCuenta_p int)
begin
	SELECT * FROM cuenta WHERE idCuenta = idCuenta_p;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarPorIdPersona`(in idPersona_p int)
begin
	SELECT * FROM personas join telefonos on personas.telefonos_idTelefono = telefonos.idTelefono WHERE idPersona = idPersona_p;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarPorIdReservacion`(in idReservacion_p int)
begin
	SELECT * FROM reservaciones WHERE idReservacion = idReservacion_p;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarPorIdServicios`(in idServicio_p int)
begin
	SELECT * FROM servicios WHERE idServicio = idServicio_p;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_buscarPorIdTipoCuarto`(in idTipoCuarto_p int)
begin
	SELECT * FROM tipoCuarto WHERE idTipoCuarto = idTipoCuarto_p;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_comCliente`()
begin
	declare ID  int;
    declare IDC int;
    
	select max(idPersona) from personas into ID;
	select max(idCliente) from clientes into IDC;
    update clientes set personas_idPersonaC = ID where idCliente = IDC;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_comRecepcionista`()
begin
	declare ID  int;
    declare IDR int;
    
	select max(idPersona) from personas into ID;
	select max(idRecepcionista) from recepcionistas into IDR;
    update recepcionistas set personas_idPersonaR = ID where idRecepcionista = IDR;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarCuarto`(in idCuarto_p int)
begin 
	delete from cuartos where idCuarto = idCuarto_p; 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarCuenta`(in idCuenta_p int)
begin 
    declare Reserve int;
    select idReservacion from reservaciones join cuenta on cuenta.reservaciones_idReservacion = idReservacion where idCuenta = idCuenta_p into Reserve;
    delete from reservaciones where idReservacion = Reserve;
    delete from cuenta where idCuenta = idCuenta_p;
    select Reserve;
	
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarPersona`(in idPersona_p int)
begin 
	declare phone varchar(20);
    declare priv tinyint;
	select telefonos_idTelefono from personas where idPersona = idPersona_p into phone;
	select privilegios from personas where idPersona = idPersona_p into priv;

	if priv = 1 then 
		delete from clientes where personas_idPersonaC = idPersona_p;
        delete from personas where idPersona = idPersona_p;
        delete from telefonos where idTelefono = phone;
       
	else 
        delete from recepcionistas where personas_idPersonaR = idPersona_p; 
        delete from personas where idPersona = idPersona_p;
		delete from telefonos where idTelefono = phone;
    end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarReservasion`(in idReservacion_p int)
begin 
    
    delete from cuenta where reservaciones_idReservacion = idReservacion_p;
    delete from reservaciones where idReservacion = idReservacion_p;
 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarServicio`(in idServicio_p int)
begin 
	delete from servicios where idServicio = idServicio_p; 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarTipoCuarto`(in idTipoCuarto_p int)
begin 
	delete from tipoCuarto where idTipoCuarto = idTipoCuarto_p; 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarCuarto`(in idCuarto_p int, in tipoCuarto_idTipoCuarto_p int, in numCuarto_p varchar(50), estatus_p varchar(50))
begin 
    
	if length(trim(tipoCuarto_idTipoCuarto_p)) = "" then
		select concat("no puede ir vacio el campo tipo cuarto ", tipoCuarto_idTipoCuarto_p);
        
        else if length(trim(numCuarto_p)) = "" then 
			select concat("recuerda llenar el numero del cuarto ", numCuarto_p);
		
			else if estatus_p = "" then
				select concat("recuerda llenar el estatus del cuarto ", estatus_p);
                
				else
					update cuartos set tipoCuarto_idTipoCuarto = tipoCuarto_idTipoCuarto_p, numCuarto = numCuarto_p, estatus = estatus_p where idCuarto = idCuarto_p;
				
            end if;    
		end if;
    end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarCuenta`(in idCuenta_p int, in reservaciones_idReservacion_p int, in cuartos_idCuarto_p int, in servicios_idServicio_p int)
begin 
	declare precioDias double;
    declare estatusCuarto varchar(50); 
    declare diasEstancia int;
	declare total_p double; 
	
    select estatus from cuartos where idCuarto = cuartos_idCuarto_p into estatusCuarto;
    
	if length(trim(reservaciones_idReservacion_p)) = "" then
		select concat("ingresa el id correcto de la reservacion", reservaciones_idReservacion_p);
		
        else if length(trim(cuartos_idCuarto_p)) = "" then 
			select concat("ingresa el id correcto del cuarto", cuartos_isCuarto_p);
            
            else 
				select estancia from reservaciones where idReservacion = reservaciones_idReservacion_p into diasEstancia;
				select precioCuarto from tipoCuarto join cuartos on cuartos.tipoCuarto_idTipoCuarto = idTipoCuarto where idCuarto = cuartos_idCuarto_p into precioDias;
				select precioDias * diasEstancia into total_p;
                
                update cuenta set reservaciones_idReservacion = reservaciones_idReservacion_p, cuartos_idCuarto = cuartos_idCuarto_p, servicios_idServicio = servicios_idServicio_p, total = total_p where idCuenta = idCuenta_p;

        end if;     
    end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarPersona`(in idPersona_p int, in telefonos_idTelefono_p int, in nombre_p varchar(50), in apellido1_p varchar(50), in apellido2_p varchar(50), in pass_p varchar(50), in privilegios_p varchar(50), in numTelefono_p varchar(20))
begin
	declare phone varchar (50);

	if length(trim(telefonos_idTelefono_p)) = "" then
		select concat("no puede ir vacio el campo de idtelefono ", telefonos_idTelefono_p);
        
        else if length(trim(nombre_p)) = "" then
			select concat("no puede ir vacio el campo de nombre ", nombre_p);
        
			else if length(trim(apellido1_p)) = "" then
				select concat("no puede ir vacion el campo de apellido", apellido1_p);
                
                else if length(trim(apellido2_p)) = "" then
					select concat("no puede ir vacion el campo de apellido", apellido2_p);
					
                    else if length(trim(pass_p)) = "" then 
						select concat("no puede ir vacio el campo de la contraseña", pass_p);
                        
                        else if length(trim(privilegios_p)) = "" then 
							select concat("revisa los privilegios", privilegios_p); 
                            
								else if length(trim(numTelefono_p)) = "" then 
									select concat("verifica que el campo de número de telefono este llenado ", numTelefono_p); 
									
								else
									
									select telefonos_idTelefono from personas where idPersona = idPersona_p into phone;
                                    update personas set nombre = nombre_p, apellido1 = apellido1_p, apellido2 = apellido2_p, pass = pass_p, privilegios = privilegios_p where idPersona = idPersona_p; 
									update telefonos set numTelefono = numTelefono_p where idTelefono = phone;
                            end if; 
                        end if; 
                    end if; 
                end if;
            end if;    
        end if;
	end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarReservaciones`(in idReservacion_p int, in clientes_idCliente_p int, in fechaEntrada_p varchar(20), in fechaSalida_p varchar(20))
begin 
     declare dif_fecha int;
     declare precio int;
     declare total_p double; 
     declare estancia_p int; 
     SELECT DATEDIFF(fechaSalida_p,fechaEntrada_p) into estancia_p;
      
     if dif_fecha < 0 then 
		select concat("Las fechas no estan ordenadas correctamente");
			
			else if length(trim(clientes_idCliente_p)) = "" then
				select concat("no puede ir vacio el idCliente", clientes_idCliente_p);
			
				else if length(trim(fechaEntrada_p)) = "" then
					select concat("no puede ir vacio la fecha de entrada", fechaEntrada_p);
						
					else if length(trim(fechaSalida_p)) = "" then
						select concat("no puede ir vacio la fecha de salida", fechaSalida_p);
						
					else
					
						select precioCuarto from tipocuarto join cuartos on cuartos.tipoCuarto_idTipoCuarto = tipoCuarto.idTipoCuarto join cuenta on cuenta.cuartos_idCuarto = cuartos.idCuarto where reservaciones_idReservacion = idReservacion_p into precio;
                    
						update reservaciones set clientes_idCliente = clientes_idCliente_p, fechaEntrada = fechaEntrada_p, fechaSalida = fechaSalida_p, estancia = estancia_p where idReservacion = idReservacion_p; 
                        
                        select precio * estancia_p into total_p;
                        
						update cuenta set total = total_p where reservaciones_idReservacion = idReservacion_p; 
					end if;        
				end if;            
			end if; 
		end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarServicios`(in idServicio_p int, in nombreServicio_p VARCHAR(50), in descripcion_p varchar(50), precioServicio_p double)
begin 
    
	if length(trim(nombreServicio_p)) = "" then
		select concat("no puede ir vacio el nombre del servicio ", nombreServicio_p);
        
        else if length(trim(descripcion_p)) = "" then 
			select concat("no puede ir vacio la descripción del servicio", descripcion_p); 
            
				else if length(trim(precioServicio_p)) < 0 then 
					select concat("recuerda llenar el precio del servicio ", precioServicio_p);
			
					else if precioServicio_p <= 0 then
							select concat("recuerda llenar el precio con cantidades mayores a cero ", precioServicio_p);
						else 
                         update servicios set nombreServicio = nombreServicio_p, descripcion = descripcion_p, precioServicio = precioServicio_p where idServicio = idServicio_p;
					end if; 
				end if;   
        end if; 
	end if;         

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_modificarTipoCuarto`(in idTipoCuarto_p int, in tipoCuarto_p VARCHAR(50), in precioCuarto_p double)
begin 
    
	if length(trim(tipoCuarto_p)) = "" then
		select concat("no puede ir vacio el campo tipo cuarto ", tipoCuarto_p);
        
        else if length(trim(precioCuarto_p)) < 0 then 
			select concat("recuerda llenar el precio del tipo de cuarto ", precioCuarto_p);
		
			else if precioCuarto_p <= 0 then
				select concat("recuerda llenar el precio con cantidades mayores a cero ", precioCuarto_p);
                
				else
					update tipoCuarto set tipoCuarto = tipoCuarto_p, precioCuarto = precioCuarto_p where idTipoCuarto = idTipoCuarto_p;
			end if;
		end if;    
	end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_quitarServicioCuenta`(in idCuenta_p int)
begin
	declare precio1 double; 
    declare costoServicio double; 
    declare totalFinal double; 
	
    select total from cuenta where idCuenta = idCuenta_p into precio1;
    
    select precioServicio from servicios join cuenta on cuenta.servicios_idServicio = servicios.idServicio where idCuenta = idCuenta_p into costoServicio;
    
    select precio1 - costoServicio into totalFinal;
  
	update cuenta set total = totalFinal where idCuenta = idCuenta_p; 
    
     update cuenta set servicios_idServicio = null where idCuenta = idCuenta_p;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recuperarTodasCuentas`()
begin 
	select * from cuenta join reservaciones on reservaciones.idReservacion = cuenta.reservaciones_idReservacion join clientes on reservaciones.clientes_idCliente = clientes.idCliente join personas on personas.idPersona = clientes.personas_idPersonaC join cuartos on cuartos.idCuarto = cuenta.cuartos_idCuarto;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recuperarTodosClientes`()
begin 
	select * from clientes join personas on clientes.personas_idPersonaC = personas.idPersona join telefonos on personas.telefonos_idTelefono = telefonos.idTelefono;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recuperarTodosCuartos`()
begin 
	select * from cuartos join tipoCuarto on cuartos.tipoCuarto_idTipoCuarto = tipoCuarto.idTipoCuarto;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recuperarTodosRecepcionistas`()
begin 
	select * from recepcionistas join personas on recepcionistas.personas_idPersonaR = personas.idPersona join telefonos on personas.telefonos_idTelefono = telefonos.idTelefono;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recuperarTodosReservaciones`()
begin 
	select * from reservaciones join clientes on reservaciones.clientes_idCliente = clientes.idCliente join personas on clientes.personas_idPersonaC = personas.idPersona;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recuperarTodosServicios`()
begin 
	select * from servicios;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_recuperarTodosTipoCuarto`()
begin 
	select * from tipoCuarto;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `personas_idPersonaC` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_personas_idPersonaC` (`personas_idPersonaC`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `personas_idPersonaC`) VALUES
(45, NULL),
(49, 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuartos`
--

CREATE TABLE IF NOT EXISTS `cuartos` (
  `idCuarto` int(11) NOT NULL AUTO_INCREMENT,
  `tipoCuarto_idTipoCuarto` int(11) DEFAULT NULL,
  `numCuarto` varchar(50) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCuarto`),
  KEY `fk_tipoCuarto_idTipoCuarto` (`tipoCuarto_idTipoCuarto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `cuartos`
--

INSERT INTO `cuartos` (`idCuarto`, `tipoCuarto_idTipoCuarto`, `numCuarto`, `estatus`) VALUES
(17, 10, 'A1', 'DISPONIBLE'),
(26, 21, 'A2', 'OCUPADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `idCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `reservaciones_idReservacion` int(11) DEFAULT NULL,
  `cuartos_idCuarto` int(11) DEFAULT NULL,
  `servicios_idServicio` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`idCuenta`),
  KEY `fk_reservaciones_idReservacion` (`reservaciones_idReservacion`),
  KEY `fk_cuartos_idCuarto` (`cuartos_idCuarto`),
  KEY `servicios_idServicio` (`servicios_idServicio`),
  KEY `servicios_idServicio_2` (`servicios_idServicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`idCuenta`, `reservaciones_idReservacion`, `cuartos_idCuarto`, `servicios_idServicio`, `total`) VALUES
(15, NULL, NULL, NULL, NULL),
(16, 71, 26, NULL, 200);

--
-- Disparadores `cuenta`
--
DROP TRIGGER IF EXISTS `tg_CuartoDisponible`;
DELIMITER //
CREATE TRIGGER `tg_CuartoDisponible` AFTER DELETE ON `cuenta`
 FOR EACH ROW begin 
    update cuartos set estatus = 'DISPONIBLE' where idCuarto = OLD.cuartos_idCuarto; 
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tg_add`;
DELIMITER //
CREATE TRIGGER `tg_add` AFTER INSERT ON `cuenta`
 FOR EACH ROW begin 
    update cuartos set estatus = 'OCUPADO' where idCuarto = NEW.cuartos_idCuarto; 
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tg_aprovarReservaciones`;
DELIMITER //
CREATE TRIGGER `tg_aprovarReservaciones` BEFORE INSERT ON `cuenta`
 FOR EACH ROW begin
	update reservaciones set aprovado = 'Sí Aprovado' where idReservacion = NEW.reservaciones_idReservacion;
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tg_cambiarCuarto`;
DELIMITER //
CREATE TRIGGER `tg_cambiarCuarto` AFTER UPDATE ON `cuenta`
 FOR EACH ROW begin 
    update cuartos set estatus = 'DISPONIBLE' where idCuarto = OLD.cuartos_idCuarto; 
    update cuartos set estatus = 'OCUPADO' WHERE idCuarto = NEW.cuartos_idCuarto;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEvento` varchar(50) NOT NULL,
  `descEvento` varchar(200) NOT NULL,
  `imgEve` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idEvento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idEvento`, `nombreEvento`, `descEvento`, `imgEve`) VALUES
(18, 'Conferencia', 'Conferencia de videojuegos. ', 'uploades/ps3-controller-cracked-4k-wallpaper.jpg'),
(19, 'Festividad.', 'Festividad', 'uploades/1000x-1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `idFaq` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(100) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  PRIMARY KEY (`idFaq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `faq`
--

INSERT INTO `faq` (`idFaq`, `pregunta`, `respuesta`) VALUES
(7, '¿Cual es su horario de atención?', 'La recepción siempre esta abierta. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `idMensaje` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMsj` varchar(50) NOT NULL,
  `correoMsj` varchar(50) NOT NULL,
  `telefonoMsj` varchar(50) DEFAULT NULL,
  `mensaje` varchar(200) NOT NULL,
  `estatusMsj` varchar(10) NOT NULL,
  PRIMARY KEY (`idMensaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `telefonos_idTelefono` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `pass` varchar(50) NOT NULL,
  `privilegios` tinyint(11) NOT NULL,
  PRIMARY KEY (`idPersona`),
  KEY `fk_telefonos_idTelefonos` (`telefonos_idTelefono`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `telefonos_idTelefono`, `nombre`, `apellido1`, `apellido2`, `pass`, `privilegios`) VALUES
(92, 82, 'Alejandro', 'Montes', 'Marte', '1234567890', 2),
(95, 86, 'A', 'A', 'a', '15', 2),
(99, 90, 'Alfonso', 'Mondragón', 'Montes', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionistas`
--

CREATE TABLE IF NOT EXISTS `recepcionistas` (
  `idRecepcionista` int(11) NOT NULL AUTO_INCREMENT,
  `personas_idPersonaR` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRecepcionista`),
  KEY `fk_personas_idPersonaR` (`personas_idPersonaR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `recepcionistas`
--

INSERT INTO `recepcionistas` (`idRecepcionista`, `personas_idPersonaR`) VALUES
(14, 92);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE IF NOT EXISTS `reservaciones` (
  `idReservacion` int(11) NOT NULL AUTO_INCREMENT,
  `clientes_idCliente` int(11) DEFAULT NULL,
  `fechaEntrada` varchar(50) DEFAULT NULL,
  `fechaSalida` varchar(50) DEFAULT NULL,
  `estancia` int(11) DEFAULT NULL,
  `aprovado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idReservacion`),
  KEY `fk_clientes_idCliente` (`clientes_idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`idReservacion`, `clientes_idCliente`, `fechaEntrada`, `fechaSalida`, `estancia`, `aprovado`) VALUES
(66, NULL, NULL, NULL, NULL, 'No Aprovado'),
(71, 49, '2020-08-08', '2020-08-12', 4, 'Sí Aprovado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `idServicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombreServicio` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precioServicio` double NOT NULL,
  `servicioIMG` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idServicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServicio`, `nombreServicio`, `descripcion`, `precioServicio`, `servicioIMG`) VALUES
(16, 'Cuarto de conferencias', 'Renta de espacio para diferentes usos. ', 100, 'uploades/services-6.jpg'),
(17, 'Desayunos', 'Desayuno para los huéspedes. ', 50, 'uploades/services-4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE IF NOT EXISTS `telefonos` (
  `idTelefono` int(11) NOT NULL AUTO_INCREMENT,
  `numTelefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idTelefono`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`idTelefono`, `numTelefono`) VALUES
(82, '123'),
(83, NULL),
(86, '123456789'),
(90, '5959274817');

--
-- Disparadores `telefonos`
--
DROP TRIGGER IF EXISTS `tg_updPersona`;
DELIMITER //
CREATE TRIGGER `tg_updPersona` AFTER INSERT ON `telefonos`
 FOR EACH ROW BEGIN
UPDATE personas SET telefonos_idTelefono = NEW.idTelefono WHERE idPersona = last_insert_id();

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocuarto`
--

CREATE TABLE IF NOT EXISTS `tipocuarto` (
  `idTipoCuarto` int(11) NOT NULL AUTO_INCREMENT,
  `tipoCuarto` varchar(50) DEFAULT NULL,
  `precioCuarto` double DEFAULT NULL,
  `imgUrl` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idTipoCuarto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `tipocuarto`
--

INSERT INTO `tipocuarto` (`idTipoCuarto`, `tipoCuarto`, `precioCuarto`, `imgUrl`, `description`) VALUES
(10, 'Suite', 650, 'uploades/suite.jpeg', 'Cuenta con 2 camas matrimoniales, televisión de pantalla plana con cable, baño completo, balcón con vista hacia el andador Juárez. '),
(21, 'Balcon', 50, 'uploades/5eaR6dL.png', 'Gran vista.');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_personas_idPersonaC` FOREIGN KEY (`personas_idPersonaC`) REFERENCES `personas` (`idPersona`);

--
-- Filtros para la tabla `cuartos`
--
ALTER TABLE `cuartos`
  ADD CONSTRAINT `fk_tipoCuarto_idTipoCuarto` FOREIGN KEY (`tipoCuarto_idTipoCuarto`) REFERENCES `tipocuarto` (`idTipoCuarto`);

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `fk_cuartos_idCuarto` FOREIGN KEY (`cuartos_idCuarto`) REFERENCES `cuartos` (`idCuarto`),
  ADD CONSTRAINT `fk_reservaciones_idReservacion` FOREIGN KEY (`reservaciones_idReservacion`) REFERENCES `reservaciones` (`idReservacion`),
  ADD CONSTRAINT `fk_servicios_idServicio` FOREIGN KEY (`servicios_idServicio`) REFERENCES `servicios` (`idServicio`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_telefonos_idTelefonos` FOREIGN KEY (`telefonos_idTelefono`) REFERENCES `telefonos` (`idTelefono`);

--
-- Filtros para la tabla `recepcionistas`
--
ALTER TABLE `recepcionistas`
  ADD CONSTRAINT `fk_personas_idPersonaR` FOREIGN KEY (`personas_idPersonaR`) REFERENCES `personas` (`idPersona`);

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `fk_clientes_idCliente` FOREIGN KEY (`clientes_idCliente`) REFERENCES `clientes` (`idCliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
