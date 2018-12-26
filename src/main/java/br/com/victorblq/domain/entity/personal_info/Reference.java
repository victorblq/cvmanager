package br.com.victorblq.domain.entity.personal_info;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.validation.constraints.NotEmpty;

import br.com.victorblq.domain.entity.AbstractEntity;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, 12/26/2018
 */
@Data
@Entity
@EqualsAndHashCode(callSuper=true)
@NoArgsConstructor
public class Reference extends AbstractEntity{
	
	private static final long serialVersionUID = -4937394536561912792L;
	
	@NotEmpty
	@Column(length=100)
	private String name;
	@NotEmpty
	@Column(length=50)
	private String contact;

}
