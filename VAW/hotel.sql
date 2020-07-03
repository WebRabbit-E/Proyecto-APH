-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2020 a las 22:26:06
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
CREATE  PROCEDURE `sp_addCuarto`( in tipoCuarto_idTipoCuarto_p int, in numCuarto_p varchar(50), estatus_p varchar(50))
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

CREATE  PROCEDURE `sp_addCuenta`( in reservaciones_idReservacion_p int, in cuartos_idCuarto_p int, in servicios_idServicio_p int)
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
                
                insert into cuenta values(null,reservaciones_idReservacion_p, cuartos_idCuarto_p, servicios_idServicio_p, total_p);
            end if; 
        end if;     
    end if;
end$$

CREATE  PROCEDURE `sp_addPersona`( in telefonos_idTelefono_p int, in nombre_p varchar(50), in apellido1_p varchar(50), in apellido2_p varchar(50), in pass_p varchar(50), in privilegios_p varchar(50), in numTelefono_p varchar(20))
begin
	
    -- declare privilegiosCliente varchar(50);
    
    declare cantidad int; 
    select count(*) into cantidad from personas where trim(pass) = trim(pass_p);
    
	if length(trim(telefonos_idTelefono_p)) = "" then
		select concat("no puede ir vacio el campo de idtelefono ", telefonos_idTelefono_p);
        
        else if length(trim(nombre_p)) = "" then
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
	end if;
end$$

CREATE  PROCEDURE `sp_addReservaciones`( in clientes_idCliente_p int, in fechaEntrada_p varchar(20), in fechaSalida_p varchar(20), in estancia_p int, in aprovado_p varchar(50))
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

CREATE  PROCEDURE `sp_addServicios`( in nombreServicio_p varchar(50), in descripcion_p varchar(50), precioServicio_p double)
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

CREATE  PROCEDURE `sp_addTipoCuarto`( in tipoCuarto_p varchar(50), in precioCuarto_p double)
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

CREATE  PROCEDURE `sp_agregarServicioCuenta`(in idCuenta_p int, in idServicio_p int)
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

CREATE  PROCEDURE `sp_buscadorCuarto`(in numCuarto_p varchar(50))
begin
select * from cuartos where numCuarto like numCuarto_p;
end$$

CREATE  PROCEDURE `sp_buscarPorIdCuarto`(in idCuarto_p int)
begin
	SELECT * FROM cuartos WHERE idCuarto = idCuarto_p;
end$$

CREATE  PROCEDURE `sp_buscarPorIdCuenta`(in idCuenta_p int)
begin
	SELECT * FROM cuenta WHERE idCuenta = idCuenta_p;
end$$

CREATE  PROCEDURE `sp_buscarPorIdPersona`(in idPersona_p int)
begin
	SELECT * FROM personas join telefonos on personas.telefonos_idTelefono = telefonos.idTelefono WHERE idPersona = idPersona_p;
end$$

CREATE  PROCEDURE `sp_buscarPorIdReservacion`(in idReservacion_p int)
begin
	SELECT * FROM reservaciones WHERE idReservacion = idReservacion_p;
end$$

CREATE  PROCEDURE `sp_buscarPorIdServicios`(in idServicio_p int)
begin
	SELECT * FROM servicios WHERE idServicio = idServicio_p;
end$$

CREATE  PROCEDURE `sp_buscarPorIdTipoCuarto`(in idTipoCuarto_p int)
begin
	SELECT * FROM tipoCuarto WHERE idTipoCuarto = idTipoCuarto_p;
end$$

CREATE  PROCEDURE `sp_comCliente`()
begin
	declare ID  int;
    declare IDC int;
    
	select max(idPersona) from personas into ID;
	select max(idCliente) from clientes into IDC;
    update clientes set personas_idPersonaC = ID where idCliente = IDC;
end$$

CREATE  PROCEDURE `sp_comRecepcionista`()
begin
	declare ID  int;
    declare IDR int;
    
	select max(idPersona) from personas into ID;
	select max(idRecepcionista) from recepcionistas into IDR;
    update recepcionistas set personas_idPersonaR = ID where idRecepcionista = IDR;
end$$

CREATE  PROCEDURE `sp_eliminarCuarto`(in idCuarto_p int)
begin 
	delete from cuartos where idCuarto = idCuarto_p; 
end$$

CREATE  PROCEDURE `sp_eliminarCuenta`(in idCuenta_p int)
begin 
    declare Reserve int;
    select idReservacion from reservaciones join cuenta on cuenta.reservaciones_idReservacion = idReservacion where idCuenta = idCuenta_p into Reserve;
    delete from reservaciones where idReservacion = Reserve;
    delete from cuenta where idCuenta = idCuenta_p;
    select Reserve;
	
end$$

CREATE  PROCEDURE `sp_eliminarPersona`(in idPersona_p int)
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

CREATE  PROCEDURE `sp_eliminarReservasion`(in idReservacion_p int)
begin 
    
    delete from cuenta where reservaciones_idReservacion = idReservacion_p;
    delete from reservaciones where idReservacion = idReservacion_p;
 
end$$

CREATE  PROCEDURE `sp_eliminarServicio`(in idServicio_p int)
begin 
	delete from servicios where idServicio = idServicio_p; 
end$$

CREATE  PROCEDURE `sp_eliminarTipoCuarto`(in idTipoCuarto_p int)
begin 
	delete from tipoCuarto where idTipoCuarto = idTipoCuarto_p; 
end$$

CREATE  PROCEDURE `sp_modificarCuarto`(in idCuarto_p int, in tipoCuarto_idTipoCuarto_p int, in numCuarto_p varchar(50), estatus_p varchar(50))
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

CREATE  PROCEDURE `sp_modificarCuenta`(in idCuenta_p int, in reservaciones_idReservacion_p int, in cuartos_idCuarto_p int, in servicios_idServicio_p int)
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

CREATE  PROCEDURE `sp_modificarPersona`(in idPersona_p int, in telefonos_idTelefono_p int, in nombre_p varchar(50), in apellido1_p varchar(50), in apellido2_p varchar(50), in pass_p varchar(50), in privilegios_p varchar(50), in numTelefono_p varchar(20))
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

CREATE  PROCEDURE `sp_modificarReservaciones`(in idReservacion_p int, in clientes_idCliente_p int, in fechaEntrada_p varchar(20), in fechaSalida_p varchar(20))
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

CREATE  PROCEDURE `sp_modificarServicios`(in idServicio_p int, in nombreServicio_p VARCHAR(50), in descripcion_p varchar(50), precioServicio_p double)
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

CREATE  PROCEDURE `sp_modificarTipoCuarto`(in idTipoCuarto_p int, in tipoCuarto_p VARCHAR(50), in precioCuarto_p double)
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

CREATE  PROCEDURE `sp_quitarServicioCuenta`(in idCuenta_p int)
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

CREATE  PROCEDURE `sp_recuperarTodasCuentas`()
begin 
	select * from cuenta join reservaciones on reservaciones.idReservacion = cuenta.reservaciones_idReservacion join clientes on reservaciones.clientes_idCliente = clientes.idCliente join personas on personas.idPersona = clientes.personas_idPersonaC join cuartos on cuartos.idCuarto = cuenta.cuartos_idCuarto;
end$$

CREATE  PROCEDURE `sp_recuperarTodosClientes`()
begin 
	select * from clientes join personas on clientes.personas_idPersonaC = personas.idPersona join telefonos on personas.telefonos_idTelefono = telefonos.idTelefono;
end$$

CREATE  PROCEDURE `sp_recuperarTodosCuartos`()
begin 
	select * from cuartos join tipoCuarto on cuartos.tipoCuarto_idTipoCuarto = tipoCuarto.idTipoCuarto;
end$$

CREATE  PROCEDURE `sp_recuperarTodosRecepcionistas`()
begin 
	select * from recepcionistas join personas on recepcionistas.personas_idPersonaR = personas.idPersona join telefonos on personas.telefonos_idTelefono = telefonos.idTelefono;
end$$

CREATE  PROCEDURE `sp_recuperarTodosReservaciones`()
begin 
	select * from reservaciones join clientes on reservaciones.clientes_idCliente = clientes.idCliente join personas on clientes.personas_idPersonaC = personas.idPersona;
end$$

CREATE  PROCEDURE `sp_recuperarTodosServicios`()
begin 
	select * from servicios;
end$$

CREATE  PROCEDURE `sp_recuperarTodosTipoCuarto`()
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `personas_idPersonaC`) VALUES
(44, 78);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `cuartos`
--

INSERT INTO `cuartos` (`idCuarto`, `tipoCuarto_idTipoCuarto`, `numCuarto`, `estatus`) VALUES
(17, 10, 'A1', 'DISPONIBLE'),
(18, 11, '45', 'DISPONIBLE');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`idEvento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`idEvento`, `nombreEvento`, `descEvento`) VALUES
(1, 'Boda', 'Es la boda de Pepe y Chona. Fecha:8/10/2024.'),
(2, 'Conferencia', 'Sobre el nuevo libro de M.Laeangle.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `idFaq` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(100) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  PRIMARY KEY (`idFaq`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `faq`
--

INSERT INTO `faq` (`idFaq`, `pregunta`, `respuesta`) VALUES
(1, '¿Cuentan con recreación acuatica de algún tipo?', 'No ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `telefonos_idTelefono`, `nombre`, `apellido1`, `apellido2`, `pass`, `privilegios`) VALUES
(78, 68, 'Pedros', 'Chaparro', 'Torres', '123', 1),
(82, 72, 'Ale', 'Materno', 'Sas', '123', 2),
(83, 73, 'Erika', 'Vega', 'Valdez', '123', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionistas`
--

CREATE TABLE IF NOT EXISTS `recepcionistas` (
  `idRecepcionista` int(11) NOT NULL AUTO_INCREMENT,
  `personas_idPersonaR` int(11) DEFAULT NULL,
  PRIMARY KEY (`idRecepcionista`),
  KEY `fk_personas_idPersonaR` (`personas_idPersonaR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `recepcionistas`
--

INSERT INTO `recepcionistas` (`idRecepcionista`, `personas_idPersonaR`) VALUES
(4, 82),
(5, 83);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`idReservacion`, `clientes_idCliente`, `fechaEntrada`, `fechaSalida`, `estancia`, `aprovado`) VALUES
(59, 44, '2020-06-15', '2020-06-17', 2, 'No Aprovado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `idServicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombreServicio` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `precioServicio` double DEFAULT NULL,
  PRIMARY KEY (`idServicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServicio`, `nombreServicio`, `descripcion`, `precioServicio`) VALUES
(2, 'desayunos', 'huevos y tocino de puerco', 121),
(3, 'Lavanderia', 'Lavado de ropa. ', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE IF NOT EXISTS `telefonos` (
  `idTelefono` int(11) NOT NULL AUTO_INCREMENT,
  `numTelefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idTelefono`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`idTelefono`, `numTelefono`) VALUES
(68, '123'),
(72, '123456789'),
(73, '1234567899');

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
  PRIMARY KEY (`idTipoCuarto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tipocuarto`
--

INSERT INTO `tipocuarto` (`idTipoCuarto`, `tipoCuarto`, `precioCuarto`) VALUES
(10, 'Suite', 250),
(11, 'Sencilla', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_commentmeta`
--

CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_comments`
--

CREATE TABLE IF NOT EXISTS `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Un comentarista de WordPress', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2020-06-20 23:12:44', '2020-06-21 05:12:44', 'Hola, esto es un comentario. Para empezar a moderar, editar y borrar comentarios, por favor, visita la pantalla de comentarios en el escritorio. Los avatares de los comentaristas provienen de <a href="https://gravatar.com">Gravatar</a>.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_links`
--

CREATE TABLE IF NOT EXISTS `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_options`
--

CREATE TABLE IF NOT EXISTS `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=127 ;

--
-- Volcado de datos para la tabla `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/alfonso', 'yes'),
(2, 'home', 'http://localhost/alfonso', 'yes'),
(3, 'blogname', 'web', 'yes'),
(4, 'blogdescription', 'Otro sitio realizado con WordPress', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'admin@admin.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'j F, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'j F, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:74:{s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:21:"^index.php/wp-json/?$";s:22:"index.php?rest_route=/";s:24:"^index.php/wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:58:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:68:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:88:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:83:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:83:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:64:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:53:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$";s:91:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$";s:85:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1";s:77:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:72:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]";s:65:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]";s:72:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$";s:98:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]";s:61:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$";s:97:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]";s:47:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:57:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:77:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:72:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:72:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:53:"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]";s:51:"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]";s:38:"([0-9]{4})/comment-page-([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&cpage=$matches[2]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:0:{}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '-6', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'twentyseventeen', 'yes'),
(41, 'stylesheet', 'twentyseventeen', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '38590', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '1', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'posts', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(79, 'widget_text', 'a:0:{}', 'yes'),
(80, 'widget_rss', 'a:0:{}', 'yes'),
(81, 'uninstall_plugins', 'a:0:{}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '0', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '0', 'yes'),
(93, 'initial_db_version', '38590', 'yes'),
(94, 'wp_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:61:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(95, 'fresh_site', '1', 'yes'),
(96, 'WPLANG', 'es_MX', 'yes'),
(97, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(98, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(99, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(100, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(101, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(102, 'sidebars_widgets', 'a:5:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}s:13:"array_version";i:3;}', 'yes'),
(103, 'widget_pages', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(104, 'widget_calendar', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(105, 'widget_media_audio', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(106, 'widget_media_image', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(107, 'widget_media_gallery', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(108, 'widget_media_video', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(109, 'widget_tag_cloud', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(110, 'widget_nav_menu', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(111, 'widget_custom_html', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(112, 'cron', 'a:4:{i:1592719967;a:1:{s:34:"wp_privacy_delete_old_export_files";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:6:"hourly";s:4:"args";a:0:{}s:8:"interval";i:3600;}}}i:1592759567;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}i:1592802792;a:2:{s:19:"wp_scheduled_delete";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}s:25:"delete_expired_transients";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:5:"daily";s:4:"args";a:0:{}s:8:"interval";i:86400;}}}s:7:"version";i:2;}', 'yes'),
(113, 'theme_mods_twentyseventeen', 'a:1:{s:18:"custom_css_post_id";i:-1;}', 'yes'),
(117, '_site_transient_update_core', 'O:8:"stdClass":3:{s:7:"updates";a:0:{}s:15:"version_checked";s:5:"4.9.8";s:12:"last_checked";i:1592716376;}', 'no'),
(118, '_site_transient_update_plugins', 'O:8:"stdClass":1:{s:12:"last_checked";i:1592716383;}', 'no'),
(119, '_site_transient_timeout_theme_roots', '1592718183', 'no'),
(120, '_site_transient_theme_roots', 'a:6:{s:10:"MyTemplate";s:7:"/themes";s:5:"draco";s:7:"/themes";s:10:"storefront";s:7:"/themes";s:13:"twentyfifteen";s:7:"/themes";s:15:"twentyseventeen";s:7:"/themes";s:13:"twentysixteen";s:7:"/themes";}', 'no'),
(121, '_site_transient_update_themes', 'O:8:"stdClass":1:{s:12:"last_checked";i:1592716383;}', 'no'),
(123, 'can_compress_scripts', '1', 'no'),
(124, '_transient_timeout_dash_v2_3605f57d6641b1f6504fce9d39bcf566', '1592759598', 'no'),
(125, '_transient_dash_v2_3605f57d6641b1f6504fce9d39bcf566', '<div class="rss-widget"><p><strong>Error RSS:</strong> WP HTTP Error: stream_socket_client(): php_network_getaddresses: getaddrinfo failed: No such host is known. \nstream_socket_client(): unable to connect to tcp://es-mx.wordpress.org:80 (php_network_getaddresses: getaddrinfo failed: No such host is known. )</p></div><div class="rss-widget"><p><strong>Error RSS:</strong> WP HTTP Error: No working transports found</p></div>', 'no'),
(126, '_transient_is_multi_author', '0', 'yes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_postmeta`
--

CREATE TABLE IF NOT EXISTS `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_posts`
--

CREATE TABLE IF NOT EXISTS `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2020-06-20 23:12:44', '2020-06-21 05:12:44', 'Bienvenido a WordPress. Esta es tu primera entrada. Edítala o bórrala, ¡y comienza a publicar!.', '¡Hola mundo!', '', 'publish', 'open', 'open', '', 'hola-mundo', '', '', '2020-06-20 23:12:44', '2020-06-21 05:12:44', '', 0, 'http://localhost/alfonso/?p=1', 0, 'post', '', 1),
(2, 1, '2020-06-20 23:12:44', '2020-06-21 05:12:44', 'Esta es una página de ejemplo, Es diferente a una entrada de un blog porque se mantiene estática y se mostrará en la barra de navegación (en la mayoría de temas). Casi todo el mundo comienza con una página "Acerca De" para presentarse a los potenciales visitantes. Podría ser algo así:\n\n<blockquote>¡Hola!: Soy mensajero por el día, aspirante a actor por la noche y esta es mi web. Vivo en Guadalajara, tengo un gran perro llamado Khal y me encantan las piñas coladas (y empaparme en la lluvia)</blockquote>\n\n… o algo así:\n\n<blockquote>La empresa Banpatrás XYZ se fundó en 1971, y ha estado invirtiendo el ahorro de sus clientes desde entonces. Ubicada en Ciudad Gótica, Banpatrás XYZ tiene más de 2.000 empleados e hace toda clase de cosas increíbles por la comunidad de Ciudad Gótica</blockquote>\n\nSi eres nuevo en WordPress deberías ir a <a href="http://localhost/alfonso/wp-admin/">tu escritorio</a> para borrar esta página y crear algunas nuevas con tu contenido. ¡Diviértete!', 'Página de ejemplo', '', 'publish', 'closed', 'open', '', 'pagina-ejemplo', '', '', '2020-06-20 23:12:44', '2020-06-21 05:12:44', '', 0, 'http://localhost/alfonso/?page_id=2', 0, 'page', '', 0),
(3, 1, '2020-06-20 23:12:44', '2020-06-21 05:12:44', '<h2>Quiénes somos</h2><p>La dirección de nuestro sitio web es: http://localhost/alfonso.</p><h2>Que datos personales recolectamos y por qué lo hacemos</h2><h3>Comentarios</h3><p>Cuando los visitantes dejan comentarios en el sitio, recolectamos los datos mostrados en el formato de comentarios y también la dirección IP del visitante y la cadena del agente del navegador del usuario, para facilitar la detección de spam.</p><p>Una cadena alfanumérica anonimizada a partir de tu dirección de correo (también llamada &quot;hash&quot;) puede ser enviada al servicio Gravatar para ver si lo estás usando.  El servicio Gravatar de políticas de privacidad está disponible aquí: https://automattic.com/privacy/. Después de aprobar tu comentario, tu imagen de perfil será públicamente visible dentro del contexto de tu comentario.</p><h3>Medios</h3><p>Si subes imágenes al sitio web, debes evitar subir imágenes con información de localización incrustada (EXIF GPS).  Los visitantes del sitio web pueden bajar y extraer cualquier información de ubicación de las imágenes en el sitio web.</p><h3>Formas de contacto</h3><h3>Cookies</h3><p>Si dejas un comentario en nuestro sitio, puedes optar por guardar tu nombre, dirección de correo y sitio web en cookies.  Estas con para tu conveniencia, de modo que no tengas que llenar cada campo con tus datos nuevamente cuando quieras dejar otro comentario.  Estas cookies duran un año.</p><p>Si tienes una cuenta y entras en línea en este sitio, crearemos una cookie temporal para determinar si tu navegador acepta cookies.  Esta cookie no contiene información personal y se borra al cerrar tu navegador.</p><p>Al entrar en línea, también creamos varias cookies para almacenar tu información de ingreso y preferencias de pantalla.  Las cookies de ingreso duran dos días y las de preferencias de pantalla un año.  Si seleccionas &quot;Recordarme&quot;, tu información de ingreso persistirá por dos semanas. Si sales de tu cuenta, las cookies de ingreso serán removidas.</p><p>Si modificas o publicas un artículo, se guardará una cookie en tu navegador.  Esta cookie no incluye datos personales y simplemente indica el ID de la entrada del artículo que modificaste.  Expira en un día.</p><h3>Contenido integrado de otros sitios web</h3><p>Los artículos de este sitio pueden incluir contenido integrado (por ejemplo videos, imágenes, artículos, etc.).  El contenido integrado de otros sitios web se comporta de la misma manera como si el visitante hubiera visitado el otro sitio web.</p><p>Este tipo de sitios web puede recolectar datos sobre ti, usar cookies, incluir servicios de rastreo de terceros y monitorear tu interacción con dicho contenido integrado, incluyendo el rastreo de tu interacción con dicho contenido integrado si tienes una cuenta registrada y estás en línea en dicho sitio web.</p><h3>Analíticos</h3><h2>Con quién compartimos tus datos</h2><h2>Por cuánto tiempo retendremos tus datos</h2><p>Si dejas un comentario, el comentario y sus meta-datos serán retenidos por tiempo indefinido.  Esto se necesita para que podamos identificar y aprobar cualquier comentario de seguimiento de forma automática, en vez de mantenerlos en una lista de espera para moderarlos.</p><p>Para usuarios registrados en nuestro sitio web (si hay), también necesitamos almacenar la información personal que incluyen en su perfil. Todos los usuarios pueden ver, modificar o borrar su información personal en cualquier momento (excepto que no pueden cambiar su nombre de usuario).  Los administradores del sitio web también pueden ver y modificar dicha información.</p><h2>Que derechos tienes sobre tus datos</h2><p>Si tienes una cuenta en ese sitio, o has dejado comentarios, puedes solicitar el envío de un archivo de exportación con los datos personales que tenemos sobre ti, incluyendo cualquier dato que nos hayas dado. También puedes solicitar que borremos cualquier dato personal que tengamos sobre ti. Esto no incluye ningún dato que estemos obligados a mantener por razones administrativas, legales o de seguridad.</p><h2>A dónde enviamos tus datos</h2><p>Los comentarios de los visitantes se pueden verificar a través de un servicio automático de detección de spam.</p><h2>Tus datos de contacto</h2><h2>Información Adicional</h2><h3>Cómo protegemos tus datos</h3><h3>Procedimientos de violaciones de seguridad de datos que ponemos en práctica</h3><h3>Terceras partes de las que recibimos datos</h3><h3>Decisiones automáticas y/o perfilamiento que realizamos con los datos del usuario</h3><h3>Requerimientos de aclaraciones regulatorias de la industria</h3>', 'Política de Privacidad', '', 'draft', 'closed', 'open', '', 'aviso-de-privacidad', '', '', '2020-06-20 23:12:44', '2020-06-21 05:12:44', '', 0, 'http://localhost/alfonso/?page_id=3', 0, 'page', '', 0),
(4, 1, '2020-06-20 23:13:14', '0000-00-00 00:00:00', '', 'Borrador automático', '', 'auto-draft', 'open', 'open', '', '', '', '', '2020-06-20 23:13:14', '0000-00-00 00:00:00', '', 0, 'http://localhost/alfonso/?p=4', 0, 'post', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_termmeta`
--

CREATE TABLE IF NOT EXISTS `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_terms`
--

CREATE TABLE IF NOT EXISTS `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Sin categoría', 'sin-categoria', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_term_relationships`
--

CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Volcado de datos para la tabla `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_usermeta`
--

CREATE TABLE IF NOT EXISTS `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'root'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', 'wp496_privacy'),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:1:{s:64:"a450fc8827b24a95a9516836c7806371f83a82faa46377942e2fb81b2ac5183c";a:4:{s:10:"expiration";i:1593925991;s:2:"ip";s:3:"::1";s:2:"ua";s:78:"Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:77.0) Gecko/20100101 Firefox/77.0";s:5:"login";i:1592716391;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_users`
--

CREATE TABLE IF NOT EXISTS `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'root', '$P$BGG.mY4UYqHGXm7j4ywW3YPCQO3qkc/', 'root', 'admin@admin.com', '', '2020-06-21 05:12:43', '', 0, 'root');

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
